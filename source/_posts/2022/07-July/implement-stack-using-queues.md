---
extends: _layouts.post
section: content
title: Implement stack using queues
problemUrl: https://leetcode.com/problems/implement-stack-using-queues/
date: 2022-07-21
categories: [queue]
---

It's easy to implement a stack using queue. You can pop, peek and check the empty as you normally do in a queue. You just need to do some extra work during the push method. First you push it to the queue, then you pop every element of the queue except the last one and push it back to the queue, this will mimic the push functionality of the stack.

```python
class MyStack:
    def __init__(self):
        self._q = collections.deque()

    def push(self, x: int) -> None:
        q = self._q
        q.append(x)
        for _ in range(len(q)-1):
            q.append(q.popleft())
        
    def pop(self) -> int:
        return self._q.popleft()
        
    def top(self) -> int:
        return self._q[0]

    def empty(self) -> bool:
        return len(self._q) == 0

# Your MyStack object will be instantiated and called as such:
# obj = MyStack()
# obj.push(x)
# param_2 = obj.pop()
# param_3 = obj.top()
# param_4 = obj.empty()
```

Time complexity for every operation will be `O(1)` except push. For push the time complexity is linear, `O(n)`. Space complexity is also `O(n)`.