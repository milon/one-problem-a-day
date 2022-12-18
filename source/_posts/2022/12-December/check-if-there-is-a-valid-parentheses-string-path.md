---
extends: _layouts.post
section: content
title: Check if there is a valid parentheses string path
problemUrl: https://leetcode.com/problems/check-if-there-is-a-valid-parentheses-string-path/
date: 2022-12-18
categories: [dynamic-programming]
---

We will use top-down memoization to solve the problem. For every opening parenthesis we add 1 to our current and for every closing parenthesis we subtract 1 from our current. If we ever reach a negative number, we return false. If we reach the end of the string and our current is 0, we return true. If we reach the end of the string and our current is not 0, we return false. If we have already calculated the result for the current string, we return the result.

```python
class Solution:
    def hasValidPath(self, grid: List[List[str]]) -> bool:
        ROWS, COLS = len(grid), len(grid[0])
        dicts = {"(": 1, ")": -1}

        @cache
        def dp(x, y, cur):
            if x == ROWS or y == COLS:
                return False
            
            cur += dicts[grid[x][y]]
            if cur < 0: 
                return False
            
            if (x, y) == (ROWS-1, COLS-1):
                return cur == 0
            
            return dp(x + 1, y, cur) or dp(x, y + 1, cur)
        
        return dp(0, 0, 0)
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n^2)`