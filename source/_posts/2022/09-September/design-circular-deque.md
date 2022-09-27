---
extends: _layouts.post
section: content
title: Design circular deque
problemUrl: https://leetcode.com/problems/design-circular-deque/
date: 2022-09-27
categories: [queue, design]
---

We can use a deque from the collections in python, and use it as our q. We just need to make sure, we don't overflow the queue as we are given a size.

```python
class MyCircularDeque:
    def __init__(self, k: int):
        self.q = collections.deque()
        self.size = k

    def insertFront(self, value: int) -> bool:
        if len(self.q) == self.size:
            return False
        
        self.q.appendleft(value)
        return True

    def insertLast(self, value: int) -> bool:
        if len(self.q) == self.size:
            return False
        
        self.q.append(value)
        return True

    def deleteFront(self) -> bool:
        if len(self.q) == 0:
            return False
        
        self.q.popleft()
        return True

    def deleteLast(self) -> bool:
        if len(self.q) == 0:
            return False
        
        self.q.pop()
        return True

    def getFront(self) -> int:
        if len(self.q) == 0:
            return -1
        
        return self.q[0]

    def getRear(self) -> int:
        if len(self.q) == 0:
            return -1
        
        return self.q[-1]

    def isEmpty(self) -> bool:
        return len(self.q) == 0

    def isFull(self) -> bool:
        return len(self.q) == self.size


# Your MyCircularDeque object will be instantiated and called as such:
# obj = MyCircularDeque(k)
# param_1 = obj.insertFront(value)
# param_2 = obj.insertLast(value)
# param_3 = obj.deleteFront()
# param_4 = obj.deleteLast()
# param_5 = obj.getFront()
# param_6 = obj.getRear()
# param_7 = obj.isEmpty()
# param_8 = obj.isFull()
```

Time Complexity: `O(1)`, for each operation <br/>
Space Complexity: `O(n)`, n is the size of the queue