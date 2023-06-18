---
extends: _layouts.post
section: content
title: Number of increasing paths in a grid
problemUrl: https://leetcode.com/problems/number-of-increasing-paths-in-a-grid/
date: 2023-06-17
categories: [dynamic-programming, graph]
---

We will start DFS from the top left corner of the grid and keep track of the number of paths that we have found so far. We will also keep track of the number of paths that we have found so far for each cell in the grid. If we have already found the number of paths for a cell then we will return the number of paths for that cell.

```python
class Solution:
    def countPaths(self, grid: List[List[int]]) -> int:
        ROWS, COLS, mod = len(grid), len(grid[0]), 10**9+7

        @lru_cache(None)
        def count(i, j):
            res = 1
            for x, y in [(i, j+1), (i, j-1), (i+1, j), (i-1, j)]:
                if 0 <= x < ROWS and 0 <= y < COLS and grid[x][y] < grid[i][j]:
                    res += count(x, y) % mod
            return res

        return sum(count(i,j) for i in range(ROWS) for j in range(COLS)) % mod
```

Time Complexity: `O(m*n)` where `m` is the number of rows and `n` is the number of columns. <br/>
Space Complexity: `O(m*n)` where `m` is the number of rows and `n` is the number of columns.