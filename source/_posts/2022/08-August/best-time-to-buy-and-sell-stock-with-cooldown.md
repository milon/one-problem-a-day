---
extends: _layouts.post
section: content
title: Best time to buy and sell stock with cooldown
problemUrl: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-with-cooldown/
date: 2022-08-12
categories: [dynamic-programming]
---

We will solve the problem with brute force using a decision tree and run DFS with that. If our index is already out of bound we return 0, this will be our base case. From there, if we are buying, then next decision will be selling or cooldown. Similarly, if we are selling, next decision will be buying or cooldown. But if you sell, we are not allowed to buy it on the next day, so we are forced to take a cooldown. Then we will get the maximum of both decision and return that. 

If we notice at the decision tree, we are actually doing a lot of duplicate calculation. So, we can use memoization to store the already calculated value in a hashmap.

```python
class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        def _maxProfit(i: int, buy: bool, memo: dict) -> int:
            if (i, buy) in memo:
                return memo[(i, buy)]
            
            if i >= len(prices):
                return 0
            
            maxVal = _maxProfit(i+1, buy, memo)     # cooldown
            if buy:
                buying = _maxProfit(i+1, not buy, memo) - prices[i]
                maxVal = max(buying, maxVal)
            else:
                selling = _maxProfit(i+2, not buy, memo) + prices[i]
                maxVal = max(selling, maxVal)
            
            memo[(i, buy)] = maxVal
            return memo[(i, buy)]
        
        return _maxProfit(0, True, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`