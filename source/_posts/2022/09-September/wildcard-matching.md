---
extends: _layouts.post
section: content
title: Wildcard matching
problemUrl: https://leetcode.com/problems/wildcard-matching/
date: 2022-09-10
categories: [dynamic-programming]
---

We will start from the first character from the beginning of 2 sting, if they match, then we move to the next string, if the character is `?` in p, then also we move to the next string. If the character is `*`, then we move match with every possibility. We will then use memoization to make the solution efficient.

```python
class Solution:
    def isMatch(self, s: str, p: str) -> bool:
        def check(i, j, memo):
            if (i, j) in memo:
                return memo[(i, j)]
            if j == len(p):
                return i == len(s)
            
            if p[j] == "*":
                memo[(i, j)] = check(i, j+1, memo) or (i < len(s) and check(i+1, j, memo))
            else:
                memo[(i, j)] = i < len(s) and p[j] in (s[i], "?") and check(i+1, j+1, memo)
            
            return memo[(i, j)]
                
        return check(0, 0, {})
```

Time Complexity: `O(n*m)`, n is the length of s and m is the length if p <br/>
Space Complexity: `O(n*m)`