---
extends: _layouts.post
section: content
title: Spiral matrix II
problemUrl: https://leetcode.com/problems/spiral-matrix-ii/
date: 2022-09-14
categories: [math-and-geometry]
---

First we will initialize the matrix with 0 value in all of it's position. Then we will determine the value of left, right, top and bottom. Then we assing the value k from the top row to our matrix, then right column, then bottom row in reverse order and then left column in reverse order. Each time we assing a value k, we increase it by 1. We will continue this until we assing value to every element of the matrix and return the matrix as result.

```python
class Solution:
    def generateMatrix(self, n: int) -> List[List[int]]:
        matrix = [[0 for i in range(n)] for j in range(n)]
        k = 1
        
        left, right = 0, len(matrix[0])
        top, bottom = 0, len(matrix)
        
        while left < right and top < bottom:
            # left to right
            for i in range(left, right):
                matrix[top][i] = k
                k+=1
            top += 1
            
            # top to bottom
            for i in range(top, bottom):
                matrix[i][right - 1] = k
                k+=1
            right -= 1

            # right to left
            for i in range(right - 1, left - 1, -1):
                matrix[bottom - 1][i] = k
                k+=1
            bottom -= 1
            
            # bottom to top last time
            for i in range(bottom - 1, top - 1, -1):
                matrix[i][left] = k
                k+=1
            left += 1
        
        return matrix
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`