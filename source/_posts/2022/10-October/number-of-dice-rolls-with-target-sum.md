---
extends: _layouts.post
section: content
title: Number of dice rolls with target sum
problemUrl: https://leetcode.com/problems/number-of-dice-rolls-with-target-sum/
date: 2022-10-02
categories: [dynamic-programming]
---

We will take the brute force method to solve the problem, in every iteration till n, we will take 1 to k elements and add it to our total recursively. Then when we reach the target, we will add it to our result. Then we will return the result by modding it by the given number. Finally, we will apply memoization to reduce repetative work.

```python
class Solution:
    def numRollsToTarget(self, n: int, k: int, target: int) -> int:
        MOD = 10**9+7
        
        def dp(n, target, memo):
            if (n, target) in memo:
                return memo[(n, target)]
            if n < 0 or target < 0:
                return 0
            if n == 0 and target == 0:
                return 1
            total = 0
            for i in range(1, k+1):
                total += dp(n-1, target-i, memo)
            memo[(n, target)] = total % MOD
            return memo[(n, target)]
        
        return dp(n, target, {})
```

Time Complexity: `O(n*k*t)`, n = number of dice, k = number of faces in the dice, t = target <br/>
Space Complexity: `O(n*k*t)`