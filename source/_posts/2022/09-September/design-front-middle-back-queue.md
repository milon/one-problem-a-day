---
extends: _layouts.post
section: content
title: Design front middle back queue
problemUrl: https://leetcode.com/problems/design-front-middle-back-queue/
date: 2022-09-29
categories: [queue, design]
---

We will use 2 queue, both of them will have half of the elements. One queue must not be bigger than 1 element. Every time we add and remove an element, we will balance both the queue.

```python
class FrontMiddleBackQueue:
    def __init__(self):
        self.A, self.B = collections.deque(), collections.deque()

    def pushFront(self, val: int) -> None:
        self.A.appendleft(val)
        self._balance()

    def pushMiddle(self, val: int) -> None:
        if len(self.A) > len(self.B):
            self.B.appendleft(self.A.pop())
        self.A.append(val)

    def pushBack(self, val: int) -> None:
        self.B.append(val)
        self._balance()

    def popFront(self) -> int:
        val = self.A.popleft() if self.A else -1
        self._balance()
        return val

    def popMiddle(self) -> int:
        val = (self.A or [-1]).pop()
        self._balance()
        return val

    def popBack(self) -> int:
        val = (self.B or self.A or [-1]).pop()
        self._balance()
        return val
        
    # keep A.size() >= B.size()
    def _balance(self):
        if len(self.A) > len(self.B) + 1:
            self.B.appendleft(self.A.pop())
        if len(self.A) < len(self.B):
            self.A.append(self.B.popleft())
        
# Your FrontMiddleBackQueue object will be instantiated and called as such:
# obj = FrontMiddleBackQueue()
# obj.pushFront(val)
# obj.pushMiddle(val)
# obj.pushBack(val)
# param_4 = obj.popFront()
# param_5 = obj.popMiddle()
# param_6 = obj.popBack()
```

Time Complexity: `O(1)` for each operation <br/>
Space Complexity: `O(n)`