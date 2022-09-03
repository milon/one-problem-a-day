---
extends: _layouts.post
section: content
title: Equal row and column pairs
problemUrl: https://leetcode.com/problems/equal-row-and-column-pairs/
date: 2022-09-03
categories: [array-and-hashmap]
---

We will create a hashmap where we will count the rows occurance, the key will be the row as tuple and the value will be the count. Then we move through the column, search in the lookup hashmap for any match, if we found one, count this as out result. Finally we will return the count.

```python
class Solution:
    def equalPairs(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        lookup = collections.defaultdict(int)
        for row in grid:
            lookup[tuple(row)] += 1
        
        res = 0
        for j in range(COLS):
            col = [grid[i][j] for i in range(ROWS)]
            res += lookup[tuple(col)]
        return res
```

Time Complexity: `O(n*m)`, n is the number of rows and m is the number of columns <br/>
Space Complexity: `O(n*m)`