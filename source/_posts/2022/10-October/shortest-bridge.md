---
extends: _layouts.post
section: content
title: Shortest bridge
problemUrl: https://leetcode.com/problems/shortest-bridge/
date: 2022-10-26
categories: [graph]
---

We will first scan the grid to find the first island and mark it with 2 after exploring it with DFS. Then we will start a BFS from the first island and explore the grid to find the second island. We will mark the cells of the first island with 3 to avoid visiting the same place again and again and return the number of steps it took to reach the second island.

```python
class Solution:
    def shortestBridge(self, grid: List[List[int]]) -> int:
        def dfs(r, c):
            grid[r][c] = 2
            q.appendleft((r, c))
            for nr, nc in [(r-1, c), (r, c+1), (r+1, c), (r, c-1)]:
                if 0 <= nr < n and 0 <= nc < n and grid[nr][nc] == 1:
                    dfs(nr, nc)
        
        def get_first_cell():
            for r in range(n):
                for c in range(n):
                    if grid[r][c] == 1:
                        return r, c

        n = len(grid)
        row, col = get_first_cell()  # get the first cell of value 1
        q = collections.deque()  # (row, col) for BFS
        dfs(row, col)  # DFS
        res = 0
        
        while q:
            size = len(q)
            for _ in range(size):
                r, c = q.pop()
                for nr, nc in (r - 1, c), (r, c + 1), (r + 1, c), (r, c - 1):
                    if 0 <= nr < n and 0 <= nc < n:
                        if not grid[nr][nc]:
                            grid[nr][nc] = 3
                            q.appendleft((nr, nc))
                        elif grid[nr][nc] == 1:
                            return res
            res += 1
        
        return res
```

Time complexity: O(n^2) <br/>
Space complexity: O(n^2)