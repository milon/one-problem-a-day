---
extends: _layouts.post
section: content
title: Number of smooth descent periods of a stock
problemUrl: https://leetcode.com/problems/number-of-smooth-descent-periods-of-a-stock/
date: 2022-08-27
categories: [dynamic-programming]
---

We will start by result and count to be equals to 1. Then in each iteration of the array from index 1 to the rest, we check with the previous element, if the previous number is exactly bigger by 1, then we add it to our count, and add the count to our result. If the difference is more than 1, then we reset the count to 1 and add it to the result. Finally, we return the result after the iteration is over.

```python
class Solution:
    def getDescentPeriods(self, prices: List[int]) -> int:
        result = 1
        count = 1
        for i in range(1, len(prices)):
            if prices[i] == prices[i-1]-1:
                count += 1
            else:
                count = 1
            result += count
        return result
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`