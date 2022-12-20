---
extends: _layouts.post
section: content
title: Backspace string compare
problemUrl: https://leetcode.com/problems/backspace-string-compare/
date: 2022-12-20
categories: [stack]
---

We will create a helper function that will take a string and return the string after applying the backspace operation. To evaluate, we will append each character to a stack, and whenever we hit a backspace we pop it from the stack. Then we will compare the two strings.

```python
class Solution:
    def backspaceCompare(self, s: str, t: str) -> bool:
        def backspaceEvaluate(string: str) -> str:
            stack = []
            for ch in string:
                if ch == '#':
                    if stack:
                        stack.pop()
                else:
                    stack.append(ch)
            return ''.join(stack)
        
        return backspaceEvaluate(s) == backspaceEvaluate(t)        
```

Time complexity: `O(n+m)` where `n` is the length of `s` and `m` is the length of `t`. <br> 
Space complexity: `O(n+m)`