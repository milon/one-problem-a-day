---
extends: _layouts.post
section: content
title: Number of ways to buy pens and pencils
problemUrl: https://leetcode.com/problems/number-of-ways-to-buy-pens-and-pencils/
date: 2022-12-06
categories: [math-and-geometry]
---

We will loop over the `pens` and `pencils` and add the start and end points to a list. Then we will sort the list and loop over it. We will keep track of the current color and the current start point. When we reach a new color, we will add the current color and the current start point to the result. Then we will update the current color and the current start point.

```python
class Solution:
    def waysToBuyPensPencils(self, total: int, cost1: int, cost2: int) -> int:
        cost1, cost2 = max(cost1, cost2), min(cost1, cost2)
        res = 0
        for i in range(1+total // cost1):
            left = max(total-i*cost1, 0)
            res += 1+left // cost2
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`