---
extends: _layouts.post
section: content
title: Count ways to build good strings
problemUrl: https://leetcode.com/problems/count-ways-to-build-good-strings/
date: 2023-05-12
categories: [dynamic-programming]
---

All we care about is low and high. We subtruct from high number of zeros or number of ones if can. Same we do for low but max it with 0. If we reached 0 in low than we add one to the answer.

```python
class Solution:
    def countGoodStrings(self, low: int, high: int, zero: int, one: int) -> int:
        MOD = 10**9+7
        
        @cache
        def _countGoodStrings(lo: int, hi: int) -> int:
            res = int(lo == 0)
            if hi-zero >= 0:
                res +=  _countGoodStrings(max(0, lo-zero), hi-zero)
            if hi-one >= 0:
                res += _countGoodStrings(max(0, lo-one), hi-one)
            return res % MOD
        
        return _countGoodStrings(low, high)
```

Time complexity: `O(n)` where `n` is `high-low` <br/>
Space complexity: `O(n)`