---
extends: _layouts.post
section: content
title: Minimum path sum
problemUrl: https://leetcode.com/problems/minimum-path-sum/
date: 2022-07-18
categories: [dynamic-programming]
---

We will first solve it with brute force using recursion and then use memoization to make it efficient. For recursion, we can think about the base case, if our current position is out of bound, then we return infinity, if we are at the end block, then there is only 1 way to the destination block, and if we are 2 blocks away form the destination then we will take the position itseft and the minimum of other 2 options. These 3 are our base case. Then we go forward from there.

```python
import math

class Solution:
    def minPathSum(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        
        def traverse(r, c, memo):
            if (r,c) in memo:
                return memo[(r,c)]
            if r >= ROWS or c>=COLS:
                return math.inf
            if r == ROWS-1 and c == COLS-1:
                return grid[r][c]
            memo[(r,c)] = grid[r][c] + min(traverse(r+1, c, memo), traverse(r, c+1, memo))
            return memo[(r,c)]
        
        return traverse(0, 0, {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`