---
extends: _layouts.post
section: content
title: Number of islands
problemUrl: https://leetcode.com/problems/number-of-islands/
date: 2022-08-29
categories: [graph]
---

We will iterate over the grid, if we found land which is 1, we start dfs from there, and added all the adjacent 1 to the visited set. We will also increase the number of islands for that. When the iteration of the whole grid is done, we will return the number of islands.

```python
class Solution:
    def numIslands(self, grid: List[List[str]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        visit = set()
        
        def dfs(r, c):
            if r<0 or r>=ROWS or c<0 or c>=COLS or grid[r][c] == "0" or (r,c) in visit:
                return 0
            visit.add((r,c))    
            dfs(r-1, c)
            dfs(r+1, c)
            dfs(r, c-1)
            dfs(r, c+1)
            return 1
        
        count = 0
        for r in range(ROWS):
            for c in range(COLS):
                count += dfs(r, c)
        return count
```

Time Complexity: `O(n^2)`
Space Complexity: `O(n)`