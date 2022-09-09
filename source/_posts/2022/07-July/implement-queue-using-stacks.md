---
extends: _layouts.post
section: content
title: Implement queue using stacks
problemUrl: https://leetcode.com/problems/implement-queue-using-stacks/
date: 2022-07-24
categories: [queue, design]
---

We will have 2 stack, one for input, one for output. Whenever we push anything, we push it to the input stack, then pop every element from input stack and push it back to output stack. Every other operation we do it in output stack. 

```python
class MyQueue:
    def __init__(self):
        self.input = []
        self.output = []
        
    def push(self, x: int) -> None:
        self.input.append(x)

    def pop(self) -> int:
        self.peek()
        return self.output.pop()

    def peek(self) -> int:
        if self.output == []:
            while self.input != []:
                self.output.append(self.input.pop())
        return self.output[-1]

    def empty(self) -> bool:
        return self.input == [] and self.output == []

# Your MyQueue object will be instantiated and called as such:
# obj = MyQueue()
# obj.push(x)
# param_2 = obj.pop()
# param_3 = obj.peek()
# param_4 = obj.empty()
```

Time complexity for push and empty operation will be `O(1)`, for pop and push it's `O(n)`. Space complexity is also `O(n)`.