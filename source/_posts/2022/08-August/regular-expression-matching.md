---
extends: _layouts.post
section: content
title: Regular expression matching
problemUrl: https://leetcode.com/problems/regular-expression-matching/
date: 2022-08-13
categories: [dynamic-programming]
---

We will go through our decision tree, and then we have 2 choices, either we take the * or we skip it. Based on this logic, we will create a recursive DFS solution for our problem. Then we memoize it to make it efficient.

```python
class Solution:
    def isMatch(self, s: str, p: str) -> bool:
        def _isMatch(i: int, j: int, memo: dict):
            if (i, j) in memo:
                return memo[(i, j)]
            
            if i >= len(s) and j >= len(p):
                return True
            
            if j >= len(p):
                return False
            
            match = i < len(s) and (s[i] == p[j] or p[j] == ".")
            if (j + 1) < len(p) and p[j + 1] == "*":
                memo[(i, j)] = (_isMatch(i, j+2, memo) or                   # dont use *
                                 (match and _isMatch(i+1, j, memo)))        # use *
                return memo[(i, j)]
            
            if match:
                memo[(i,j)] = _isMatch(i+1, j+1, memo)
                return memo[(i,j)]
            
            memo[(i,j)] = False
            return False
        
        return _isMatch(0, 0, {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`