---
extends: _layouts.post
section: content
title: Sparse matrix multiplication
problemUrl: https://leetcode.com/problems/sparse-matrix-multiplication/
date: 2022-11-30
categories: [math-and-geometry]
---

We will iterate over the non-zero elements of the first matrix and multiply them with the corresponding elements of the second matrix. We will store the result in a dictionary and return the result.

```python
class Solution:
    def multiply(self, mat1: List[List[int]], mat2: List[List[int]]) -> List[List[int]]:
        res = [[0] * len(mat2[0]) for _ in range(len(mat1))]
        
        for ri, row in enumerate(mat1):
            for ei, element in enumerate(row):
                if element:
                    for ci, column in enumerate(mat2[ei]):
                        res[ri][ci] += element * column
        
        return res
```

Time complexity: `O(n^3)`, n is the length of the matrix <br/>
Space complexity: `O(1)`