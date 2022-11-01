---
extends: _layouts.post
section: content
title: Where will the ball fall
problemUrl: https://leetcode.com/problems/where-will-the-ball-fall/
date: 2022-11-01
categories: [array-and-hashmap]
---

We drop the ball at grid[0][c] and track ball position c1, which initlized as c. An observation is that,
if the ball wants to move from c1 to c2, we must have the board direction grid[r][c1] == grid[r][c2].

```python
class Solution:
    def findBall(self, grid: List[List[int]]) -> List[int]:
        ROWS, COLS = len(grid), len(grid[0])
        
        def path(c: int) -> int:
            for r in range(ROWS):
                dc = c + grid[r][c]
                if dc < 0 or dc >= COLS or grid[r][dc] != grid[r][c]:
                    return -1
                c = dc
            return c
        
        return map(path, range(COLS))
```

Time complexity: `O(r*c)` <br/>
Space complexity: `O(c)`