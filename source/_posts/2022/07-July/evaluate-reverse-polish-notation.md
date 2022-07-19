---
extends: _layouts.post
section: content
title: Evaluate reverse polish notation
problemUrl: https://leetcode.com/problems/evaluate-reverse-polish-notation/
date: 2022-07-19
categories: [stack]
---

We can go through each character and put this on a stack. When we find any arithmetic symbol, we pop last 2 element for the stack, do the operation and push back the value to the stack. After the iteration is over, we will have only one value left in our stack. We will return that value.

```python
class Solution:
    def evalRPN(self, tokens: List[str]) -> int:
        stack = []
        for c in tokens:
            if c == '+':
                stack.append(stack.pop() + stack.pop())
            elif c == '-':
                a, b = stack.pop(), stack.pop()
                stack.append(b-a)
            elif c == '*':
                stack.append(stack.pop() * stack.pop())
            elif c =='/':
                a, b = stack.pop(), stack.pop()
                stack.append(int(b/a))
            else:
                stack.append(int(c))
        return stack[0]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`