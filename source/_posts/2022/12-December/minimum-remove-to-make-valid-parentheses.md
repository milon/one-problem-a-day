---
extends: _layouts.post
section: content
title: Minimum remove to make valid parentheses
problemUrl: https://leetcode.com/problems/minimum-remove-to-make-valid-parentheses/
date: 2022-12-28
categories: [stack]
---

We will use a stack to store the index of the open parentheses. If we see a close parentheses, we will pop the stack. If the stack is empty, we will mark the close parentheses as invalid. After we finish the iteration, we will mark all the open parentheses as invalid. We will return the string after we remove all the invalid parentheses.

```python
class Solution:
    def minRemoveToMakeValid(self, s: str) -> str:
        s = list(s)
        stack = []
        for i, char in enumerate(s):
            if char == '(':
                stack.append(i)
            elif char == ')':
                if stack:
                    stack.pop()
                else:
                    s[i] = ''
        
        while stack:
            s[stack.pop()] = ''
        
        return ''.join(s)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
