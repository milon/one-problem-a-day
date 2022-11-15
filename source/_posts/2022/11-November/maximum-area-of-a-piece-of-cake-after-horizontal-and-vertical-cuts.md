---
extends: _layouts.post
section: content
title: Maximum area of a piece of cake after horizontal and vertical cuts
problemUrl: https://leetcode.com/problems/maximum-area-of-a-piece-of-cake-after-horizontal-and-vertical-cuts/
date: 2022-11-15
categories: [greedy]
---

We will add border cuts to our horizontal and vertical cuts. Then all we need to do is consider all horizontal gaps between adjacent cuts, all vertical gaps between adjacent cuts, choose the biggest among each group and multiply them. Why it will work? Imagine, that we have horizontal gaps say 1, 7, 3 and vertical gaps 8, 3, 9, then maximum among products of numbers max(1*8, 1*3, 1*9, 7*8, 7*3, 7*9, 3*8, 3*3, 3*9) = 7*9.
    
```python
class Solution:
    def maxArea(self, h: int, w: int, horizontalCuts: List[int], verticalCuts: List[int]) -> int:
        MOD = 10**9+7
        height = sorted([0]+horizontalCuts+[h])
        weight = sorted([0]+verticalCuts+[w])
        return max(j-i for i,j in zip(height, height[1:])) * max(j-i for i,j in zip(weight, weight[1:])) % MOD
```

Time complexity: `O(nlogn+mlogm)` <br>
Space complexity: `O(n+m)`