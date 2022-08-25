---
extends: _layouts.post
section: content
title: Count servers that communicate
problemUrl: https://leetcode.com/problems/count-servers-that-communicate/
date: 2022-08-25
categories: [graph]
---

We iterate over each row, and check if we have another 1 in the row, then we add both of them in the result count. We do the same thing for column, and iterate over it to find another value for 1 and add that. Finally, we return the count.

```python
class Solution:
    def countServers(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        
        def helper(r, c):
            for i in range(ROWS):
                if grid[i][c] == 1 and i != r:
                    return 1
            for j in range(COLS):
                if grid[r][j] == 1 and j != c:
                    return 1
            return 0
        
        count = 0
        for r in range(ROWS):
            for c in range(COLS):
                if grid[r][c] == 1:
                    count += helper(r, c)
                    
        return count
```

Time Complexity: `O(n*m)`, n is the number of rows and m is the number of columns <br/>
Space Complexity: `O(1)`