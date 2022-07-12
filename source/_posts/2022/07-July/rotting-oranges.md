---
extends: _layouts.post
section: content
title: Rotting oranges
date: 2022-07-12
categories: [graph]
---

Problem URL: [Rotting oranges](https://leetcode.com/problems/rotting-oranges/)

This is a BFS problem. We have to count the number of steps as minutes to return. If we can't traverse the whole grid, then we will return -1. Only tricky part is we can have multiple rotten oranges in the grid at the very beginning. So, we can go through the whole grid, and add all the rotten oranges in our queue. In the process, we will also count the fresh oranges. Then while traversing, we will decrease the number of fresh oranges one by one. When our traverse is done, if we have fresh oranges left, we will return -1, or we will return the time.

```python
class Solution:
    def orangesRotting(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        q = collections.deque()
        fresh = 0
        time = 0
        
        for r in range(ROWS):
            for c in range(COLS):
                if grid[r][c] == 1:
                    fresh += 1
                if grid[r][c] == 2:
                    q.appendleft((r, c))
        
        directions = [[0, 1], [0, -1], [1, 0], [-1, 0]]
        while fresh > 0 and q:
            length = len(q)
            for i in range(length):
                r , c = q.pop()
                
                for dr, dc in directions:
                    row, col = r+dr, c+dc
                    if row in range(ROWS) and col in range(COLS) and grid[row][col] == 1:
                        grid[row][col] = 2
                        q.append((row, col))
                        fresh -=1
            time += 1
        return time if fresh == 0 else -1
```

This is a pretty efficient solution. Out time complexity is `O(n*m)` where n is the number of rows and m is the number of columns of the grid. Our space complexity is also `O(n*m)`.