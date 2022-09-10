---
extends: _layouts.post
section: content
title: Coloring a border
problemUrl: https://leetcode.com/problems/coloring-a-border/
date: 2022-09-10
categories: [graph]
---

We will run a DFS starting from given row and column and get all the nodes that are same color. If a node is not in perimeter of the same color region, the number of adjacent node will be 4 for this node. We if we find a node that has less than 4 nodes of the same color, we color that grid with the given color. Then we return the changed grid as result.

```python
class Solution:
    def colorBorder(self, grid: List[List[int]], row: int, col: int, color: int) -> List[List[int]]:
        ROWS, COLS = len(grid), len(grid[0])
        visited = set()
        
        def dfs(r, c):
            if (r, c) in visited:
                return 1
            if r<0 or r>=ROWS or c<0 or c>=COLS or grid[r][c] != grid[row][col]:
                return 0
            
            visited.add((r, c))
            if dfs(r+1, c) + dfs(r-1, c) + dfs(r, c+1) + dfs(r, c-1) < 4:
                grid[r][c] = color
            return 1
        
        dfs(row, col)
        return grid
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`