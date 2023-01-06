---
extends: _layouts.post
section: content
title: Max increase to keep city skyline
problemUrl: https://leetcode.com/problems/max-increase-to-keep-city-skyline/
date: 2023-01-06
categories: [greedy]
---

For grid[i][j], it can't be higher than the maximun of its row nor the maximum of its column. So the maximum increasing height for a building at (i, j) is `min(row[i], col[j]) - grid[i][j]`. 

rows: maximum for every row, cols: maximum for every col, the fisrt loop of grid calcule maximum for every row and every col. The second loop calculate the maximum increasing height for every building.

```python
class Solution:
    def maxIncreaseKeepingSkyline(self, grid: List[List[int]]) -> int:
        rows, cols = list(map(max, grid)), list(map(max, zip(*grid)))
        return sum(min(i, j) for i in rows for j in cols) - sum(map(sum, grid))
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`