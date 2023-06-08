---
extends: _layouts.post
section: content
title: Count negative numbers in a sorted matrix
problemUrl: https://leetcode.com/problems/count-negative-numbers-in-a-sorted-matrix/
date: 2023-06-05
categories: [array-and-hashmap]
---

We will iterate through each row and count the number of negative numbers in each row. We will add the count to the total count.

```python
class Solution:
    def countNegatives(self, grid: List[List[int]]) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        res = 0
        r, c = ROWS-1, 0
        while r >= 0 and c < COLS:
            if grid[r][c] < 0:
                res += COLS - c
                r -= 1
            else:
                c += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`