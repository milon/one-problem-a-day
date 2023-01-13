---
extends: _layouts.post
section: content
title: Number of good binary strings
problemUrl: https://leetcode.com/problems/number-of-good-binary-strings/
date: 2023-01-13
categories: [dynamic-programming]
---

We will solve it using top-down dynamic programming. We will create a helper function dp that will return the number of good binary strings of length `n` and ending with `end`. Then we will return the number of good binary strings of length `n`. We will use memoization to avoid re-computation.

```python
class Solution:
    def goodBinaryStrings(self, minLength: int, maxLength: int, oneGroup: int, zeroGroup: int) -> int:
        MOD = 10**9+7
        
        @cache
        def dp(i: int) -> int:
            if i > maxLength:
                return 0
            
            res = minLength <= i <= maxLength
            
            return (res + dp(i+oneGroup) + dp(i+zeroGroup)) % MOD
        
        return dp(0)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`