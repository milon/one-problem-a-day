---
extends: _layouts.post
section: content
title: Best time to buy and sell stock II
problemUrl: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-ii/
date: 2022-09-10
categories: [dynamic-programming]
---

We will create a helper function to calculate the max profit, in each step, we can either buy or if we already bought, then we can sell. And each of these steps, we can either take the item or skip the item. Then we will take the maximum of these two and return it as the result. Then we will use memoization to improve our efficiency.

```python
class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        def _maxProfit(i, hasBuy, memo):
            if (i, hasBuy) in memo:
                return memo[(i, hasBuy)]
            
            if i >= len(prices):
                return 0
            
            if hasBuy:
                take = prices[i] + _maxProfit(i+1, not hasBuy, memo)
                skip = _maxProfit(i+1, hasBuy, memo)
            else:
                take = -prices[i] + _maxProfit(i+1, not hasBuy, memo)
                skip = _maxProfit(i+1, hasBuy, memo)
            
            memo[(i, hasBuy)] = max(take, skip)
            return memo[(i, hasBuy)]
        
        return _maxProfit(0, False, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`