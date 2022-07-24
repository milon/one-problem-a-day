---
extends: _layouts.post
section: content
title: Search a 2d matrix II
problemUrl: https://leetcode.com/problems/search-a-2d-matrix-ii/
date: 2022-07-24
categories: [binary-search]
---

if the current grid value matrix[r][c] is less than the target, that means, we don't need to search in this row anymore, as all the values are already bigger than the matrix[r][c]. If the value is greater than the target, then we move the column position one position left and compare. If the target is equal to the value we return true, if we traverse the whole matrix and can't find the value, we return false.

```python
class Solution:
    def searchMatrix(self, matrix: List[List[int]], target: int) -> bool:
        m, n = len(matrix), len(matrix[0])
        r, c = 0, n-1
        while r < m and c >= 0:
            if target > matrix[r][c]:
                r += 1
            elif target < matrix[r][c]:
                c -= 1
            else: 
                return True
        return False
```

Time Complexity: `O(m*n)` <br/>
Space Complexity: `O(1)`