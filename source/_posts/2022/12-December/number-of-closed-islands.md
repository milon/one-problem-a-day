---
extends: _layouts.post
section: content
title: Number of closed islands
problemUrl: https://leetcode.com/problems/number-of-closed-islands/
date: 2022-12-16
categories: [graph]
---

We will use a DFS approach to solve this problem. We will iterate through the grid. We will check if the current cell is a land. We will check if the current cell is a closed island. We will return the number of closed islands.

```python
class Solution:
    def closedIsland(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])

        def dfs(r, c):
            if r < 0 or r >= ROWS or c < 0 or c >= COLS or grid[r][c] == 1:
                return True
            grid[r][c] = 1
            return dfs(r+1, c) and dfs(r-1, c) and dfs(r, c+1) and dfs(r, c-1)
        
        res = 0
        for r in range(ROWS):
            for c in range(COLS):
                if grid[r][c] == 0 and dfs(r, c):
                    res += 1
        return res
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`