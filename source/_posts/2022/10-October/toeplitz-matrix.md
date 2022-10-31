---
extends: _layouts.post
section: content
title: Toeplitz matrix
problemUrl: https://leetcode.com/problems/toeplitz-matrix/
date: 2022-10-31
categories: [array-and-hashmap]
---

We will iterate over the rows and columns and compare diagonally adjacent elements. If they are not equal, we can return false. If we reach the end of the loop, we can return true.

```python
class Solution:
    def isToeplitzMatrix(self, matrix: List[List[int]]) -> bool:
        for i in range(len(matrix)):
            for j in range(len(matrix[0])):
                if i > 0 and j > 0 and matrix[i][j] != matrix[i-1][j-1]:
                    return False
        return True
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

Here is the solution in more pythonic way:

```python
class Solution:
    def isToeplitzMatrix(self, matrix: List[List[int]]) -> bool:
        return all(r1[:-1] == r2[1:] for r1, r2 in zip(matrix, matrix[1:]))
```