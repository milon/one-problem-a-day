---
extends: _layouts.post
section: content
title: Spiral matrix
problemUrl: https://leetcode.com/problems/spiral-matrix/
date: 2022-08-07
categories: [math-and-geometry]
---

First we will determine the value of left, right, top and bottom. Then we append the top row to our result, then right column, then bottom row in reverse order and then left column in reverse order. We will continue this until we append every element of the matrix in our result array.

```python
class Solution:
    def spiralOrder(self, matrix: List[List[int]]) -> List[int]:
        res = []
        
        left, right = 0, len(matrix[0])
        top, bottom = 0, len(matrix)
        
        while left < right and top < bottom:
            # get every i in the top row
            for i in range(left, right):
                res.append(matrix[top][i])
            top += 1
            
            # get every i in the right col
            for i in range(top, bottom):
                res.append(matrix[i][right - 1])
            right -= 1
            
            if not (left < right and top < bottom):
                break
            
            # get every i in the bottom row
            for i in range(right - 1, left - 1, -1):
                res.append(matrix[bottom - 1][i])
            bottom -= 1
            
            # get every i in the left col
            for i in range(bottom - 1, top - 1, -1):
                res.append(matrix[i][left])
            
            left += 1
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`