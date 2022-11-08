---
extends: _layouts.post
section: content
title: Make the string great
problemUrl: https://leetcode.com/problems/make-the-string-great/
date: 2022-11-08
categories: [stack]
---

We will iterate over the string and push the characters into the stack. If the top of the stack is the same as the current character but in different cases, we will pop the top of the stack. Otherwise, we will push the current character into the stack.

```python
class Solution:
    def makeGood(self, s: str) -> str:
        stack = []
        for c in s:
            if stack and stack[-1] == c.swapcase():
                stack.pop()
            else:
                stack.append(c)
        return ''.join(stack)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`