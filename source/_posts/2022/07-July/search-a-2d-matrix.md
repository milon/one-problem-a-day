---
extends: _layouts.post
section: content
title: Search a 2d matrix
problemUrl: https://leetcode.com/problems/search-a-2d-matrix/
date: 2022-07-24
categories: [binary-search]
---

We can just consider the matrix as a linear sorted array. Then if we need an element number i in our flattened list, we can get it by matrix[i//col][i%col]. Then we can do a regular binary search on our flattened matrix.

```python
class Solution:
    def searchMatrix(self, matrix: List[List[int]], target: int) -> bool:
        row, col = len(matrix), len(matrix[0])
        start, end = 0, row*col-1
        while start <= end:
            mid = (start+end) // 2
            if matrix[mid//col][mid%col] > target:
                end = mid-1
            elif matrix[mid//col][mid%col] < target:
                start = mid+1
            else:
                return True
        return False
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`