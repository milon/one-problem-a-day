---
extends: _layouts.post
section: content
title: Sort the matrix diagonally
problemUrl: https://leetcode.com/problems/sort-the-matrix-diagonally/
date: 2022-08-28
categories: [math-and-geometry]
---

We will create a lehper function, that will take all the diagonal element from the matrix, based on a given row, column position, sort that and then replace the original matrix values with the sorted values. We will repeat that for each diagonal position, and finally return the matrix.

```python
class Solution:
    def diagonalSort(self, mat: List[List[int]]) -> List[List[int]]:
        ROWS, COLS = len(mat), len(mat[0])
        
        def get(x: int, y: int) -> None:
            r, c = x, y
            ans = []
            while r < ROWS and c < COLS:
                ans.append(mat[r][c])
                r += 1
                c += 1
            
            ans.sort()
            r, c = x, y
            for val in ans:
                mat[r][c] = val
                r += 1
                c += 1
        
        for c in range(COLS):
            get(0, c)
        for r in range(1, ROWS):
            get(r, 0)
        
        return mat
```

Time Complexity: `O(n*m*log(n*m))` <br/>
Space Complexity: `O(n*m)`