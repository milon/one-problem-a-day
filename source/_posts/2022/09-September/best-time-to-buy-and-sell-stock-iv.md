---
extends: _layouts.post
section: content
title: Best time to buy and sell stock IV
problemUrl: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-iv/
date: 2022-09-10
categories: [dynamic-programming]
---

We will create a helper function to calculate the max profit, in each step, we can either buy or if we already bought, then we can sell. And each of these steps, we can either take the item or skip the item. Then we will take the maximum of these two and return it as the result. Then we will use memoization to improve our efficiency.

```python
class Solution:
    def maxProfit(self, k: int, prices: List[int]) -> int:
        def _maxProfit(i, hasBuy, k, memo):
            key = (i, hasBuy, k)
            if key in memo:
                return memo[key]
            
            if i == len(prices) or k == 0:
                return 0
            
            if hasBuy:
                take = prices[i] + _maxProfit(i+1, not hasBuy, k-1, memo)
                skip = _maxProfit(i+1, hasBuy, k, memo)
            else:
                take = -prices[i] + _maxProfit(i+1, not hasBuy, k, memo)
                skip = _maxProfit(i+1, hasBuy, k, memo)
            
            memo[key] = max(take, skip)
            return memo[key]
        
        return _maxProfit(0, False, k, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`