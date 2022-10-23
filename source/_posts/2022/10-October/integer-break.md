---
extends: _layouts.post
section: content
title: Integer break
problemUrl: https://leetcode.com/problems/integer-break/
date: 2022-10-23
categories: [dynamic-programming]
---

We will use dynamic programming to solve this problem. We will create an array `dp` with size `n+1`. `dp[i]` will store the maximum product we can get by breaking `i` into two or more integers. We will iterate all numbers from 2 to n. For each number, we will iterate all numbers from 1 to `i//2`. For each number, we will calculate the maximum product we can get by breaking `i` into two or more integers. We will store the maximum product in `dp[i]`. Then we will return `dp[n]`.

```python
# Bottom-up
class Solution:
    def integerBreak(self, n: int) -> int:
        dp = [0]*(n+1)
        for i in range(2, n+1):
            for j in range(1, i//2+1):
                dp[i] = max(dp[i], j*(i-j), j*dp[i-j])
        return dp[n]
```

We can also solve the problem recursively and then memoize the smaller solutions to solve the problem faster.

```python
# Top-down
class Solution:
    def integerBreak(self, n: int) -> int:
        def dp(n, k, memo):
            if (n, k) in memo:
                return memo[(n, k)]
            
            if n == 0:
                if k == 2: return 1
                return 0
            
            res = 0
            for i in range(1, n+1):
                res = max(res, dp(n-i, min(k+1, 2), memo)*i)
            memo[(n, k)] = res
            return memo[(n, k)]
        
        return dp(n, 0, {})
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`