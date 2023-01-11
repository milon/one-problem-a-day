---
extends: _layouts.post
section: content
title: Maximum number of points with cost
problemUrl: https://leetcode.com/problems/maximum-number-of-points-with-cost/
date: 2023-01-11
categories: [dynamic-programming]
---

We will use top-down approach to solve the problem. We will calculate the maximum points for each cell. Then we will return the maximum points in the last row.

```python
class Solution:
    def maxPoints(self, points: List[List[int]]) -> int:
        ROWS = len(points)
        COLS = len(points[0])

        @cache
        def dp(r, c):
            if r == ROWS - 1:
                return points[r][c]
            
            return points[r][c] + max(best_relative_right(r+1, c), best_relative_left(r+1, c))
        
        @cache
        def best_relative_left(r, c):
            if c == 0:
                return dp(r, c)
            return max(dp(r, c), best_relative_left(r, c-1) - 1)
        
        @cache
        def best_relative_right(r, c):
            if c == COLS-1:
                return dp(r, c)
            return max(dp(r, c), best_relative_right(r, c+1) - 1)
        
        return max(dp(0, c) for c in range(COLS))
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`