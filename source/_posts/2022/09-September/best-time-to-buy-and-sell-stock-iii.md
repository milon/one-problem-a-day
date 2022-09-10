---
extends: _layouts.post
section: content
title: Best time to buy and sell stock III
problemUrl: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-iii/
date: 2022-09-10
categories: [dynamic-programming]
---

We will create a helper function to calculate the max profit, in each step, we can either buy or if we already bought, then we can sell. And each of these steps, we can either take the item or skip the item. We will also keep track of the number of transaction we do, as we are only allowed to do at most 2 transactions. Then we will take the maximum of these two and return it as the result. Then we will use memoization to improve our efficiency.

```python
class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        n = len(prices)
        
        def _maxProfit(i, hasBuy, transactions, memo):
            key = (i, hasBuy, transactions)
            if key in memo:
                return memo[key]
            
            if transactions == 2 or i == n:
                return 0
            
            if hasBuy:
                take = prices[i] + _maxProfit(i+1, not hasBuy, transactions+1, memo)
                skip = _maxProfit(i+1, hasBuy, transactions, memo)
            else:
                take = -prices[i] + _maxProfit(i+1, not hasBuy, transactions, memo)
                skip = _maxProfit(i+1, hasBuy, transactions, memo)
                
            memo[key] = max(take, skip)
            return memo[key]
        
        return _maxProfit(0, False, 0, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`