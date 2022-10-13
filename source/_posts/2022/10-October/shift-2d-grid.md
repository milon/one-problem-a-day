---
extends: _layouts.post
section: content
title: Shift 2d grid
problemUrl: https://leetcode.com/problems/shift-2d-grid/
date: 2022-10-13
categories: [math-and-geometry]
---

We are given a 2d grid of size `m x n` and an integer `k`. We need to shift the grid `k` times. In one shift operation, we shift the grid by one cell to the right. For example, if the grid is `[[1,2,3],[4,5,6],[7,8,9]]` and we want to shift it by `1` time, it becomes `[[9,1,2],[3,4,5],[6,7,8]]`.

For that we are considering the grid as a 1d array. So, we can shift the grid by `k` times by shifting the array by `k` times. After shifting the array, we can convert it back to a 2d grid.

```python
class Solution:
    def shiftGrid(self, grid: List[List[int]], k: int) -> List[List[int]]:
        ROWS, COLS = len(grid), len(grid[0])
        
        def posToVal(r, c):
            return r * COLS + c
        
        def valToPos(v):
            return [v//COLS, v%COLS]
        
        res = [[0]*COLS for i in range(ROWS)]
        
        for r in range(ROWS):
            for c in range(COLS):
                newVal = (posToVal(r, c) + k) % (ROWS*COLS)
                newRow, newCol = valToPos(newVal)
                res[newRow][newCol] = grid[r][c]
        return res
```

Time Complexity: `O(m*n)` <br/>
Space Complexity: `O(1)`