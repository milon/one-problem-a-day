---
extends: _layouts.post
section: content
title: Unique paths III
problemUrl: https://leetcode.com/problems/unique-paths-iii/
date: 2022-12-31
categories: [backtracking]
---

We first find the start squar and end square and path length which contains all squares except the blocked. Then we start the dfs from the start node to wards the end node. And we add the node to a viseted set. Then the next nodes are up,down,left,right.our base cases will be when we reach the end and the curpath is equal to path we return 1 else 0. Finaly we count all valid paths and return them.

```python
class Solution:
    def uniquePathsIII(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        start, end = (), ()
        path = 2
        for r in range(ROWS):
            for c in range(COLS):
                if grid[r][c] == 1:
                    start = (r, c)
                elif grid[r][c] == 2:
                    end = (r, c)
                elif grid[r][c] == 0:
                    path += 1
        
        visited = set()
        def dfs(start, end, curpath):
            # check if square is visited or obstacle
            if start in visited or grid[start[0]][start[1]] == -1:
                return 0
            
            # check if destination is reached and all nodes are visited 
            if start == end:
                if curpath == path:
                    return 1
                else:
                    return 0
            
            count = 0
            # add square to visited
            visited.add(start)
            #4-directional walks
            for x, y in [(0,1), (0,-1), (-1,0), (1,0)]:
                if 0 <= (x+start[0]) < ROWS and 0 <= (y+start[1]) < COLS:
                    # increment count
                    count += dfs((x+start[0], y+start[1]), end, curpath+1)
            
            # remove square from visited
            visited.remove(start)
            return count
        
        return dfs(start, end, 1)
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n^2)`