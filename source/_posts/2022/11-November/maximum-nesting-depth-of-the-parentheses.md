---
extends: _layouts.post
section: content
title: Maximum nesting depth of the parentheses
problemUrl: https://leetcode.com/problems/maximum-nesting-depth-of-the-parentheses/
date: 2022-11-10
categories: [stack]
---

We will use a stack to keep track of the maximum depth of the parentheses. We will then iterate through the string and if the current character is an opening parenthesis, we will push the current depth onto the stack. Otherwise, we will pop the top of the stack. We will then return the maximum depth of the stack.

```python
class Solution:
    def maxDepth(self, s: str) -> int:
        res, stack = 0, []
        for c in s:
            if c =='(':
                stack.append(c)
                res = max(res, len(stack))
            elif c == ')':
                stack.pop()
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`