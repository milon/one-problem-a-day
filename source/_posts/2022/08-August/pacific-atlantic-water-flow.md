---
extends: _layouts.post
section: content
title: Pacific atlantic water flow
problemUrl: https://leetcode.com/problems/pacific-atlantic-water-flow/
date: 2022-08-11
categories: [graph]
---

We will check the top row and left coulmn for pacific ocean and right column and bottom row for atlantic ocean. Then from each position of the grid, we will check whether we can reach pacific or atlantic ocean and store it in 2 different sets. Finally, we will iterate over the whole grid one more time, and if a certian position can be found in both sets, we add it to our result array, and return that.

```python
class Solution:
    def pacificAtlantic(self, heights: List[List[int]]) -> List[List[int]]:
        ROWS, COLS = len(heights), len(heights[0])
        pac, atl = set(), set()
        
        def dfs(r, c, visited, prevHeight):
            if (
                r < 0 
                or r >= ROWS 
                or c < 0 
                or c >= COLS 
                or (r, c) in visited 
                or heights[r][c] < prevHeight
            ):
                return
            
            visited.add((r, c))
            dfs(r+1, c, visited, heights[r][c])
            dfs(r-1, c, visited, heights[r][c])
            dfs(r, c+1, visited, heights[r][c])
            dfs(r, c-1, visited, heights[r][c])
            
        for c in range(COLS):
            dfs(0, c, pac, heights[0][c])
            dfs(ROWS-1, c, atl, heights[ROWS-1][c])
            
        for r in range(ROWS):
            dfs(r, 0, pac, heights[r][0])
            dfs(r, COLS-1, atl, heights[r][COLS-1])
        
        res = []
        for r in range(ROWS):
            for c in range(COLS):
                if (r, c) in pac and (r, c) in atl:
                    res.append([r, c])
        return res
```

Time Complexity: `O(n*m)`, n is the number of rows and m is the number of coulmns in the grid. <br/>
Space Complexity: `O(n*m)`