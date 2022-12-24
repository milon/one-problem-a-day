---
extends: _layouts.post
section: content
title: Domino and tromino tiling
problemUrl: https://leetcode.com/problems/domino-and-tromino-tiling/
date: 2022-12-24
categories: [dynamic-programming]
---

We will use dynamic programming to solve the problem. We will use `dp[i]` to store the number of ways to tile `i` units. We will use `dp[i] = dp[i-1] + dp[i-2] + 2 * dp[i-3]` to calculate the number of ways to tile `i` units. We will return `dp[n]`.

```python
class Solution:
    def numTilings(self, n: int) -> int:
        dp = [0] * (n+1)
        dp[0] = 1
        for i in range(1, n+1):
            dp[i] = dp[i-1] + dp[i-2]
            if i >= 3:
                dp[i] += 2 * dp[i-3]
        return dp[n] % (10**9 + 7)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can also do the same thing using top-down approach.

```python
class Solution:
    def numTilings(self, n: int) -> int:
        MOD = 10**9+7

        @cache  
        def p(n):  
            if n == 2:
                return 1
            return (p(n-1) + f(n-2)) % MOD

        @cache  
        def f(n):  
            if n <= 2:
                return n
            return (f(n-1) + f(n-2) + 2 * p(n-1)) % MOD

        return f(n)
``