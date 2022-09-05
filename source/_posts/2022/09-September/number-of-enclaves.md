---
extends: _layouts.post
section: content
title: Number of enclaves
problemUrl: https://leetcode.com/problems/number-of-enclaves/
date: 2022-09-05
categories: [graph]
---

We will run DFS from every bordering position of the grid and turn the 1's to 0's. Then we will just count the number of position where we still have 1's left, and return that count as result.

```python
class Solution:
    def numEnclaves(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        
        def dfs(r: int, c: int) -> None:
            if r<0 or r>=ROWS or c<0 or c>=COLS or grid[r][c] == 0:
                return
            
            grid[r][c] = 0
            dfs(r+1, c)
            dfs(r-1, c)
            dfs(r, c+1)
            dfs(r, c-1)
            
        # turning every bordering 1's to 0's for rows
        for r in range(ROWS):
            if grid[r][0] == 1:
                dfs(r, 0)
            if grid[r][COLS-1] == 1:
                dfs(r, COLS-1)
        
        # turning every bordering 1's to 0's for columns
        for c in range(COLS):
            if grid[0][c] == 1:
                dfs(0, c)
            if grid[ROWS-1][c] == 1:
                dfs(ROWS-1, c)
        
        # count rest of the one
        count = 0
        for r in range(ROWS):
            for c in range(COLS):
                if grid[r][c] == 1:
                    count += 1
        return count
```

Time Complexity: `O((m*n)^2)` <br/>
Space Complexity: `O(1)`