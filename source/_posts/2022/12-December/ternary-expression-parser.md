---
extends: _layouts.post
section: content
title: Ternary expression parser
problemUrl: https://leetcode.com/problems/ternary-expression-parser/
date: 2022-12-17
categories: [stack]
---

We will use a stack to evaluate the expression. We start from the end of the expression, then append the value to the stack. If the number of element in the stack is more than 2, and the second last element is a `?`, then we pop 5 element of the stack to evaluate the expression, and then put it back to the stack. We do it until the expression is done.

```python
class Solution:
    def parseTernary(self, expression: str) -> str:
        stack = []
        for ch in reversed(expression):
            stack.append(ch)
            if len(stack) >= 2 and stack[-2] == '?':
                boolean, _, true, _, false = stack.pop(), stack.pop(), stack.pop(), stack.pop(), stack.pop()
                stack.append(true if boolean =='T' else false)
        return stack[0]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
