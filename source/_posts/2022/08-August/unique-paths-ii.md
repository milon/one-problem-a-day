---
extends: _layouts.post
section: content
title: Unique paths II
problemUrl: https://leetcode.com/problems/unique-paths-ii/
date: 2022-08-28
categories: [dynamic-programming]
---

We will first solve it with brute force using recursion and then use memoization to make it efficient. For recursion, we can think about the base case, if our current position is out of bound or it hits an obstacle, then we return 0, if we are at the end block, then there is only 1 way to the destination block, these 2 are our base case. Then we go forward from there.

```python
class Solution:
    def uniquePathsWithObstacles(self, obstacleGrid: List[List[int]]) -> int:
        ROWS, COLS = len(obstacleGrid), len(obstacleGrid[0])
        
        def findPath(r, c, memo):
            if (r, c) in memo:
                return memo[(r, c)]
            if r >= ROWS or c >= COLS or obstacleGrid[r][c] == 1:
                return 0
            if r == ROWS-1 and c == COLS-1:
                return 1
            memo[(r, c)] = findPath(r+1, c, memo) + findPath(r, c+1, memo)
            return memo[(r, c)]
        
        return findPath(0, 0, {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`