---
extends: _layouts.post
section: content
title: Best time to buy and sell stock
problemUrl: https://leetcode.com/problems/best-time-to-buy-and-sell-stock/
date: 2022-07-17
categories: [sliding-window]
---

This is a classic sliding window problem. We will take 2 pointers, left pointer at the first element and right pointer as the second element. Then we forward right pointer and compare if the value at right pointer is less than the left pointer, then we move our left pointer to the right to get the smaller element. We also keep track of the differece between two pointer as a running maximum value, and update it with each iteration. Finally, when the iteration is done, we return the maximum value as our profit.

```python
from typing import List

class Solution:
    def maxProfit(self, prices: List[int]) -> int:
        res = 0
        left = 0
        for right in range(1, len(prices)):
            if prices[right] < prices[left]:
                left = right
            res = max(res, prices[right]-prices[left])
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`