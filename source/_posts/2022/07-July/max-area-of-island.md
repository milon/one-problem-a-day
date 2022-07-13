---
extends: _layouts.post
section: content
title: Max area of island
problemUrl: https://leetcode.com/problems/max-area-of-island/
date: 2022-07-11
categories: [graph]
---

This is a classing grid graph problem. We will iterate through each row and column, when we find a new land, we will then expand the area of land sorrounding. We can use BFS or DFS to do that. I will go with DFS as it's a bit easier to write. Then we will return the number of land from that DFS method. While going through the grid, we will keep track of the maximum land area, and after iterating the whole grid, we will return the maximum area.

```python
class Solution:
    def maxAreaOfIsland(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        visit = set()
        
        def dfs(r, c):
            if r<0 or r>=ROWS or c<0 or c>=COLS or grid[r][c] == 0 or (r,c) in visit:
                return 0
            visit.add((r,c))
            land = 1
            land += dfs(r-1, c)
            land += dfs(r+1, c)
            land += dfs(r, c-1)
            land += dfs(r, c+1)
            return land
        
        area = 0
        for r in range(ROWS):
            for c in range(COLS):
                area = max(area, dfs(r, c))
        return area
```

This is pretty efficient solution. We are going through the whole grid only once, so the time complexity will be `O(n*m)` where n is the number if rows and m is the number of columns. Also for space complexity, in the worst case scenerio we will store the whole grid to our visit set or our recursive dfs method's call stack. So the space complexity is also `O(n*m)`.