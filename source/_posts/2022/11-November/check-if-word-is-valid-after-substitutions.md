---
extends: _layouts.post
section: content
title: Check if word is valid after substitutions
problemUrl: https://leetcode.com/problems/check-if-word-is-valid-after-substitutions/
date: 2022-11-26
categories: [stack]
---

We will use a stack to store the characters. We will iterate over the string. If the character is `a`, we will push it to the stack. If the character is `b`, we will check if the top of the stack is `a`. If it is, we will pop the top of the stack and push `b` to the stack. If it is not, we will push `b` to the stack. If the character is `c`, we will check if the top of the stack is `b`. If it is, we will pop the top of the stack and push `c` to the stack. If it is not, we will push `c` to the stack. We will return true if the stack is empty.

```python
class Solution:
    def isValid(self, s: str) -> bool:
        stack = []
        for c in s:
            if c == 'c':
                if stack[-2:] != ['a', 'b']:
                    return False
                stack.pop()
                stack.pop()
            else:
                stack.append(c)
        return not stack
```

Time complexity: `O(n)`, n is the length of the string <br/>
Space complexity: `O(n)`