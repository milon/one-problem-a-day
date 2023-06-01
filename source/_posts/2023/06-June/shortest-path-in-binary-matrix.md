---
extends: _layouts.post
section: content
title: Shortest path in binary matrix
problemUrl: https://leetcode.com/problems/shortest-path-in-binary-matrix/
date: 2023-06-01
categories: [graph]
---

We will start BFS from the top left corner of the matrix till we reach the bottom right. Then we will return the shortest path length.

```python
class Solution:
    def shortestPathBinaryMatrix(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        if ROWS == 1 and COLS == 1:
            return 1 if not grid[0][0] else -1
        
        if grid[0][0] or grid[ROWS - 1][COLS - 1]:
            return -1
        
        directions = ((1, 0), (1, -1), (0, -1), (-1, -1), (-1, 0), (-1, 1), (0, 1), (1, 1))
        q = collections.deque([(0, 0, 1)])
        
        while q:
            i, j, pathLength = q.popleft()
            for di, dj in directions:
                newI, newJ = i + di, j + dj
                if newI == ROWS - 1 and newJ == COLS - 1:
                    return pathLength + 1
                
                if newI == -1 or newI == ROWS or newJ == -1 or newJ == COLS or grid[newI][newJ]:
                    continue
                
                grid[newI][newJ] = 1
                q.append((newI, newJ, pathLength + 1))
        
        return -1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`