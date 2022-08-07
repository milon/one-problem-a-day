---
extends: _layouts.post
section: content
title: Set matrix zeroes
problemUrl: https://leetcode.com/problems/set-matrix-zeroes/
date: 2022-08-07
categories: [math-and-geometry]
---

First we will go through the whole matrix, if we find a zero and we append it's row position to a rows to zero list and column position to columns to zero list. Then We go through each row from rows to zero and make every item 0 of that row. Same will goes for columns to zero matrix.

```python
class Solution:
    def setZeroes(self, matrix: List[List[int]]) -> None:
        rowsToZero, colsToZero = [], []
        ROWS, COLS = len(matrix), len(matrix[0])
        
        for r in range(ROWS):
            for c in range(COLS):
                if matrix[r][c] == 0:
                    rowsToZero.append(r)
                    colsToZero.append(c)
                    
        for row in rowsToZero:
            for c in range(COLS):
                matrix[row][c] = 0
        
        for col in colsToZero:
            for r in range(ROWS):
                matrix[r][col] = 0
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`