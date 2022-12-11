---
extends: _layouts.post
section: content
title: Best time to buy and sell stock with transaction fee
problemUrl: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-with-transaction-fee/
date: 2022-12-11
categories: [dynamic-programming]
---

We will use top-down dynamic programming method to solve the problem. We will create a memoization table to store the maximum profit for each day. We will use a recursive function to calculate the maximum profit for each day. If the current day is the last day, we will return 0. If the current day is not the last day, we will check if the maximum profit for the current day is already calculated. If it is, we will return the value from the memoization table. If it is not, we will calculate the maximum profit for the current day. We will check if we can sell the stock on the current day. If we can, we will check if we can buy the stock on the current day. If we can, we will return the maximum profit from the two options. If we can't, we will return the maximum profit from the current day and the next day. If we can't sell the stock on the current day, we will return the maximum profit from the current day and the next day.

```python
class Solution:
    def maxProfit(self, prices: List[int], fee: int) -> int:
        def _maxProfit(i, isHolding, memo):
            if (i, isHolding) in memo:
                return memo[(i, isHolding)]
            
            if i > len(prices)-1:
                return 0
            
            p1 = p2 = 0
            if isHolding:
                p1 = max(_maxProfit(i+1, False, memo)+prices[i]-fee, _maxProfit(i+1, True, memo))
            else:
                p2 = max(_maxProfit(i+1, True, memo)-prices[i], _maxProfit(i+1, False, memo))

            memo[(i, isHolding)] = max(p1, p2)
            return memo[(i, isHolding)]
        
        return _maxProfit(0, False, {})
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
