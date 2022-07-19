---
extends: _layouts.post
section: content
title: Min stack
problemUrl: https://leetcode.com/problems/min-stack/
date: 2022-07-19
categories: [stack]
---

We we have 2 stack. One will be the regular and the another will be min stack. When we push something in stack, we push the value in regular stack and we check the top element of the min stack. If top value is less than the value, then we push the top value again, or we push the value. When we pop, we pop from both stack.

```python
class MinStack:
    def __init__(self):
        self.stack = []
        self.minStack = []

    def push(self, val: int) -> None:
        self.stack.append(val)
        val = min(val, self.minStack[-1] if self.minStack else val)
        self.minStack.append(val)
        
    def pop(self) -> None:
        self.stack.pop()
        self.minStack.pop()

    def top(self) -> int:
        return self.stack[-1]

    def getMin(self) -> int:
        return self.minStack[-1]
```