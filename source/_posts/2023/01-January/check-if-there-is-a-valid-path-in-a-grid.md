---
extends: _layouts.post
section: content
title: Check if there is a valid path in a grid
problemUrl: https://leetcode.com/problems/check-if-there-is-a-valid-path-in-a-grid/
date: 2023-01-04
categories: [graph]
---

We will use BFS from the top-left cell towards bottom-right cell. If we reach the bottom-right cell, then we return `True`. Otherwise, we return `False`.

```python
class Solution:
    def hasValidPath(self, grid: List[List[int]]) -> bool:
        ROWS, COLS = len(grid), len(grid[0])
        up, down, left, right = (-1, 0), (1, 0), (0, -1), (0, 1)
        dirs = [(left, right), (up, down), (left, down), (right, down), (up, left), (up, right)]  # dirs[x] represents street[x+1]
        
        def dfs(x: int, y: int) -> bool:
            if x == ROWS-1 and y == COLS-1:
                return True
            for (dx, dy) in dirs[grid[x][y]-1]:
                if 0 <= x+dx < ROWS and 0 <= y+dy < COLS and grid[x+dx][y+dy] and (-dx, -dy) in dirs[grid[x+dx][y+dy]-1]:
                    tmp, grid[x][y] = grid[x][y], 0  # temporarily mark the cell as visited
                    if dfs(x+dx, y+dy):
                        return True
                    grid[x][y] = tmp  # if we come back to it (via backtracking), restore the cell
            return False
        
        return dfs(0, 0)
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`