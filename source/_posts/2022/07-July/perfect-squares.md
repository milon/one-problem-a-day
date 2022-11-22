---
extends: _layouts.post
section: content
title: Perfect squares
problemUrl: https://leetcode.com/problems/perfect-squares/
date: 2022-07-31
categories: [dynamic-programming]
---

This problem is exactly like the coin change problem. But we are not given a list of squares, we need to generate it. The biggest squares root will be the square root of the given number, without any decimal points.

```python
class Solution:
    def numSquares(self, n: int) -> int:
        squares = [i**2 for i in range(1, int(n**0.5)+1)]
        
        def _numSquares(n: int, memo: dict) -> int:
            if n in memo:
                return memo[n]
            
            if n == 0:
                return 0
            
            memo[n] = 1 + min(dp(n-s, memo) for s in squares if n>=s)
            return memo[n]
        
        return _numSquares(n, {})
```

Time Complexity: `O(n*a)`, n is the given number, a is the amount of possible squares. <br/>
Space Complexity: `O(n*a)`