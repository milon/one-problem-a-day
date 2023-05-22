---
extends: _layouts.post
section: content
title: Maximum profit from trading stocks
problemUrl: https://leetcode.com/problems/maximum-profit-from-trading-stocks/
date: 2023-05-20
categories: [dynamic-programming]
---

This is a classic 0-1 knapsack problem. We can use dynamic programming to solve this problem. We can iterate through the prices array and calculate the maximum profit for each day. The maximum profit for each day is the maximum of the maximum profit for the previous day and the maximum profit for the day before the previous day plus the price of the current day minus the price of the previous day. We can return the maximum profit for the last day.

```python
class Solution:
    def maxProfit(self, prices: List[int], fee: int) -> int:
        dp = [0, -prices[0]]
        for i in range(1, len(prices)):
            dp = [max(dp[0], dp[1] + prices[i] - fee), max(dp[1], dp[0] - prices[i])]
        
        return dp[0]
```

Time complexity: `O(n)` where n is the length of the prices array. <br/>
Space complexity: `O(n)`

We can achieve the same result with top-down dynamic programming. We can use a hashmap to store the maximum profit for each day. We can return the maximum profit for the last day.

```python
class Solution:
    def maximumProfit(self, present: List[int], future: List[int], budget: int) -> int:
        n, res = len(present), []

        for i in range(n):
            if future[i] - present[i] > 0:
                res.append((present[i], future[i]-present[i]))

        res.sort()

        @lru_cache(None)
        def dfs(i, cost):
            if i >= len(res) or cost - res[i][0] < 0:
                return 0  

            return max(res[i][1] + dfs(i+1,cost-res[i][0]), dfs(i+1,cost))

        return dfs(0, budget)
```

Time complexity: `O(nlog(n))` where n is the length of the prices array. <br/>
Space complexity: `O(n)`