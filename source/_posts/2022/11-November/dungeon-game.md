---
extends: _layouts.post
section: content
title: Dungeon game
problemUrl: https://leetcode.com/problems/dungeon-game/
date: 2022-11-15
categories: [dynamic-programming]
---

We will solve the problem recursively and then memoize the result to avoid duplicate computation. For base case, if the knight is at the bottom right corner, then the minimum health required is 1. If the knight is at the bottom row or rightmost column, then the minimum health required is the negative of the value of the cell. Otherwise, the minimum health required is the minimum of the minimum health required to reach the bottom right corner from the cell below and the minimum health required to reach the bottom right corner from the cell to the right, minus the value of the current cell.

```python
class Solution:
    def calculateMinimumHP(self, dungeon: List[List[int]]) -> int:
        ROWS, COLS = len(dungeon), len(dungeon[0])
        
        def dp(x: int, y: int, memo: dict) -> int:
            if (x, y) in memo:
                return memo[(x, y)]
            
            if x == ROWS-1 and y == COLS-1:
                return max(1, -dungeon[x][y]+1)
            
            res = math.inf
            
            if x+1 < ROWS:
                res = min(res, dp(x+1, y, memo))  #right
            if y+1 < COLS:
                res = min(res, dp(x, y+1, memo))  #down
            res += -dungeon[x][y]
            
            memo[(x, y)] = max(1, res)
            return memo[(x, y)]
            
        return dp(0, 0, {})
```

Time complexity: `O(mn)` <br>
Space complexity: `O(mn)`