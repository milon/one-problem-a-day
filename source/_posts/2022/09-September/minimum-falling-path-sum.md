---
extends: _layouts.post
section: content
title: Minimum falling path sum
problemUrl: https://leetcode.com/problems/minimum-falling-path-sum/
date: 2022-09-11
categories: [dynamic-programming]
---

We will create a helper function that will calculate the minimum path from the starting row and and column. In the helper function we will check the boundary of the column, if it is out of boundary then we return infinity. If we reach the last row, we will return 0. Then of each value, we will add the minimum value from next row and 3 adjacent column. Then we will run this helper function from each column of the starting row, and return the minimum value. We will also use memoization to reduce the complexity.

```python
class Solution:
    def minFallingPathSum(self, matrix: List[List[int]]) -> int:
        ROWS, COLS = len(matrix), len(matrix[0])
        memo = {}
        
        def pathSum(r, c):
            if (r, c) in memo:
                return memo[(r, c)]
            
            if r == ROWS:
                return 0
            
            if c<0 or c>=COLS:
                return math.inf
            
            memo[(r,c)] = matrix[r][c] + min(pathSum(r+1, c-1), pathSum(r+1, c), pathSum(r+1, c+1))
            return memo[(r, c)]
        
        minVal = math.inf
        for c in range(COLS):
            minVal = min(minVal, pathSum(0, c))
        
        return minVal
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`
