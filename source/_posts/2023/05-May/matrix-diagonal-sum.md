---
extends: _layouts.post
section: content
title: Matrix diagonal sum
problemUrl: https://leetcode.com/problems/matrix-diagonal-sum/
date: 2023-05-07
categories: [array-and-hashmap]
---

We will traverse the matrix row by row. For each row, we have to take 2 diagonal position and add it to the result. If the matrix has an odd number of rows, we have to subtract the middle element from the result. Finally, we will return the result.

```python
class Solution:
    def diagonalSum(self, mat: List[List[int]]) -> int:
        n, res = len(mat), 0
        for i in range(n):
            res += mat[i][i] + mat[i][n-i-1]
        if n % 2 == 1:
            res -= mat[n//2][n//2]            
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`