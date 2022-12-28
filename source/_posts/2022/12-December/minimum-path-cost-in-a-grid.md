---
extends: _layouts.post
section: content
title: Minimum path cost in a grid
problemUrl: https://leetcode.com/problems/minimum-path-cost-in-a-grid/
date: 2022-12-28
categories: [dynamic-programming]
---

We will use recursion with memoization to solve this problem. The function `helper` takes the current position `(r, c)` and the current cost `cost`. If the current position is the destination, we return the current cost. Otherwise, we iterate over the possible directions and return the minimum cost of the next position.

```python
class Solution:
    def minPathCost(self, grid: List[List[int]], moveCost: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        
        @cache
        def helper(r: int, c: int) -> int:
            if r == 0:
                return grid[r][c]
            else:
                return grid[r][c] + min(moveCost[grid[r-1][k]][c] + helper(r-1, k) for k in range(COLS))
        
        return min(helper(ROWS-1, c) for c in range(COLS))
```

Time complexity: `O(nm)` <br/>
Space complexity: `O(nm)`