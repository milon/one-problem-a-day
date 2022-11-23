---
extends: _layouts.post
section: content
title: Final prices with a special discount in a shop
problemUrl: https://leetcode.com/problems/final-prices-with-a-special-discount-in-a-shop/
date: 2022-11-23
categories: [stack]
---

We will iterate over the prices array. For each price, we will iterate over the prices array again to find the first price that is less than or equal to the current price. If we find the price, we will subtract the price from the current price. If we don't find the price, we will keep the current price.

```python
class Solution:
    def finalPrices(self, prices: List[int]) -> List[int]:
        stack = []
        for i, price in enumerate(prices):
            while stack and prices[stack[-1]] >= price:
                prices[stack.pop()] -= price
            stack.append(i)
        return prices
```

Time complexity: `O(n)`, n is the length of prices <br/>
Space complexity: `O(n)`