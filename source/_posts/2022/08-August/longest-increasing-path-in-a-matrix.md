---
extends: _layouts.post
section: content
title: Longest increasing path in a matrix
problemUrl: https://leetcode.com/problems/longest-increasing-path-in-a-matrix/
date: 2022-08-12
categories: [dynamic-programming]
---

We will run a DFS from each element of the matrix, and search from the longest increasing path. We will also memoize each repetative steps in the process, so we can solve it easily.

```python
class Solution:
    def longestIncreasingPath(self, matrix: List[List[int]]) -> int:
        ROWS, COLS = len(matrix), len(matrix[0])
        dp = {}

        def dfs(r, c, prevVal):
            if r<0 or r>=ROWS or c<0 or c>=COLS or matrix[r][c] <= prevVal:
                return 0
            
            if (r, c) in dp:
                return dp[(r, c)]

            res = 1
            res = max(res, 1 + dfs(r+1, c, matrix[r][c]))
            res = max(res, 1 + dfs(r-1, c, matrix[r][c]))
            res = max(res, 1 + dfs(r, c+1, matrix[r][c]))
            res = max(res, 1 + dfs(r, c-1, matrix[r][c]))
            dp[(r, c)] = res
            
            return res

        for r in range(ROWS):
            for c in range(COLS):
                dfs(r, c, -1)
                
        return max(dp.values())
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`