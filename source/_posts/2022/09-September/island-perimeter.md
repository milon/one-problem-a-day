---
extends: _layouts.post
section: content
title: Island perimeter
problemUrl: https://leetcode.com/problems/island-perimeter/
date: 2022-09-10
categories: [graph]
---

We will run a DFS starting from given row and column and get all the nodes that are same color. If a node is not in perimeter of the same color region, the number of adjacent node will be 4 for this node, that means it will have no exposed perimeter to outside. Similarly the number of exposed perimeter will be 4-number of adjacent node with the same value. We will use this logic to calculate the number of exposed perimeter of the island.

```python
class Solution:
    def islandPerimeter(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        visited = set()
        self.res = 0
        
        def dfs(r, c):
            if (r, c) in visited:
                return 1
            
            if r<0 or r>=ROWS or c<0 or c>=COLS or grid[r][c] != 1:
                return 0
            
            visited.add((r, c))
            
            adjacent = 0
            adjacent += dfs(r+1, c)
            adjacent += dfs(r-1, c)
            adjacent += dfs(r, c+1)
            adjacent += dfs(r, c-1)
            
            self.res += 4-adjacent
            return 1
            
        for r in range(ROWS):
            for c in range(COLS):
                if (r, c) not in visited:
                    dfs(r, c)
        return self.res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`