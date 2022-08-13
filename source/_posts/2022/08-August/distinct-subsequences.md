---
extends: _layouts.post
section: content
title: Distinct subsequences
problemUrl: https://leetcode.com/problems/distinct-subsequences/
date: 2022-08-13
categories: [dynamic-programming]
---

We will check each character of both string, when we find a match, then we have 2 choice, either we include the current index or we skip it. If we don't have a match, we we will skip the current character. When we reached the last character of string t, that means we already matched all the character and return the value. We will memoize the result to make it efficient.

```python
class Solution:
    def numDistinct(self, s: str, t: str) -> int:
        def _numDistinct(i: int, j: int, memo: dict):
            if (i, j) in memo:
                return memo[(i, j)]
            
            if j == 0:
                return 1
            if i == 0:
                return 0
            ans = _numDistinct(i-1, j, memo)
            if s[i-1] == t[j-1]:
                ans += _numDistinct(i-1, j-1, memo)
            
            memo[(i, j)] = ans
            return memo[(i, j)]
        
        return _numDistinct(len(s), len(t), {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`