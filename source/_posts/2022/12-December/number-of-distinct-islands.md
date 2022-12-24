---
extends: _layouts.post
section: content
title: Number of distinct islands
problemUrl: https://leetcode.com/problems/number-of-distinct-islands/
date: 2022-12-24
categories: [graph]
---

We will use a set to store the islands. We will iterate over the grid and call the dfs function on the current cell. We will return the result.

```python
class Solution:
    def numDistinctIslands(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])

        def dfs(r: int, c: int, area: str) -> str:
            if r < 0 or r >= ROWS or c < 0 or c >= COLS or grid[r][c] == 0:
                return '0'

            grid[r][c] = 0

            up = dfs(r-1, c, area)
            down = dfs(r+1, c, area)
            left = dfs(r, c-1, area)
            right = dfs(r, c+1, area)
            return up + down + left + right + '1'

        res = set()
        for r in range(ROWS):
            for c in range(COLS):
                if grid[r][c] == 1:
                    res.add(dfs(r, c, '0'))
        
        return len(res)
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`