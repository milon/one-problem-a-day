---
extends: _layouts.post
section: content
title: Design a stack with increment operation
problemUrl: https://leetcode.com/problems/design-a-stack-with-increment-operation/
date: 2022-09-06
categories: [stack]
---

We will create a stack and store the max length of the stack. If someone push anything, if the stack is not already full, we will push it to the stack. Similarly, is the stack is not empty, we returned the popped element else return -1. For increment, we will check the minimum length between k and length of the stack. The we will increase the values by provided value.

```python
class CustomStack:
    def __init__(self, maxSize: int):
        self.maxSize = maxSize
        self.stack = []

    def push(self, x: int) -> None:
        if len(self.stack) < self.maxSize:
            self.stack.append(x)

    def pop(self) -> int:
        if self.stack:
            return self.stack.pop()
        return -1

    def increment(self, k: int, val: int) -> None:
        minChangeNum = min(k, len(self.stack))
        for i in range(minChangeNum):
            self.stack[i] += val

# Your CustomStack object will be instantiated and called as such:
# obj = CustomStack(maxSize)
# obj.push(x)
# param_2 = obj.pop()
# obj.increment(k,val)
```

Time Complexity: `O(1)` for each operation, `O(k)` for increment <br/>
Space Complexity: `O(n)`