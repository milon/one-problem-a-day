---
extends: _layouts.post
section: content
title: Triangle
problemUrl: https://leetcode.com/problems/triangle/
date: 2022-11-10
categories: [dynamic-programming]
---

We will use recursive DFS to solve the problem. We will then iterate through the triangle and for each row, we will iterate through the row and update the current element with the minimum of the two elements below it plus the current element. We will then return the top element. Finally we will memoize the function.

```python
class Solution:
    def minimumTotal(self, triangle: List[List[int]]) -> int:
        def dp(r: int, c: int, memo: dict) -> int:
            if (r, c) in memo:
                return memo[(r, c)]
            
            if r == len(triangle)-1:
                return triangle[r][c]
            
            if c > len(triangle[c])-1:
                return math.inf
            
            memo[(r, c)] = triangle[r][c] + min(dp(r+1, c, memo), dp(r+1, c+1, memo))
            return memo[(r, c)]
            
        return dp(0, 0, {})
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`