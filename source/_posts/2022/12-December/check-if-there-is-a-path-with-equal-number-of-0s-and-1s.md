---
extends: _layouts.post
section: content
title: Check if there is a path with equal number of 0s and 1s
problemUrl: https://leetcode.com/problems/check-if-there-is-a-path-with-equal-number-of-0s-and-1s/
date: 2022-12-22
categories: [dynamic-programming]
---

We will use top-down dynamic programming to solve this problem. We will create a `dfs` function to find if there is a path from the current node to the end node. We will return the result of the `dfs` function. We will use memoization to cache the results of the `dfs` function.

```python
class Solution:
    def isThereAPath(self, grid: List[List[int]]) -> bool:
        ROWS, COLS = len(grid), len(grid[0])

        if (ROWS+COLS-1) % 2 == 1: 
            return False

        @cache
        def dfs(r, c, cur):
            if r >= ROWS or c >= COLS:
                return False

            cur += (grid[r][c]*2 - 1)

            if r == ROWS-1 and c == COLS-1:
                return cur == 0

            return dfs(r+1, c, cur) or dfs(r, c+1, cur)
        
        return dfs(0, 0, 0)
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`