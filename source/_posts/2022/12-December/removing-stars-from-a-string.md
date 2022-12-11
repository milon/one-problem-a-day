---
extends: _layouts.post
section: content
title: Removing stars from a string
problemUrl: https://leetcode.com/problems/removing-stars-from-a-string/
date: 2022-12-11
categories: [stack]
---

We will use a stack to store the characters of the string. If the current character is a star, we will pop the last character from the stack. If the current character is not a star, we will push it to the stack. At the end, we will return the stack as a string.

```python
class Solution:
    def removeStars(self, s: str) -> str:
        stack = []
        for ch in s:
            if ch == '*':
                stack.pop()
            else:
                stack.append(ch)
        return ''.join(stack)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
