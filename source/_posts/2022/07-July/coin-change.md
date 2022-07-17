---
extends: _layouts.post
section: content
title: Coin change
problemUrl: https://leetcode.com/problems/coin-change/
date: 2022-07-17
categories: [dynamic-programming]
---

This is a classing dynamic programming problem. First we will solve it in brute force and then memoization(top-down) to reduce complexity.

```python
from typing import List

class Solution:
    def coinChange(self, coins: List[int], amount: int) -> int:
        minCoin = self._coinChange(coins, amount, {})
        return minCoin if minCoin != float("inf") else -1

    def _coinChange(self, coins: List[int], amount: int, memo: dict) -> int:
        if amount in memo:
            return memo[amount]

        if amount < 0:
            return float("inf")
        if amount == 0:
            return 0

        minCoin = float("inf")
        for coin in coins:
            minCoin = min(minCoin, self._coinChange(coins, amount-coin, memo))
        memo[amount] = 1+minCoin
        return memo[amount]
```

Time Complexity: O(n*a), n is the number of coins, a is the amount of money <br/>
Space Complexity: O(n*a)