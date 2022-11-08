---
extends: _layouts.post
section: content
title: Pascals triangle II
problemUrl: https://leetcode.com/problems/pascals-triangle-ii/
date: 2022-11-08
categories: [array-and-hashmap]
---

We know n level pascals triangle will have n level. We will start with level 1, we put 1 there. Then we will start a loop from level 2 to level n. Then we fill up the whole level with 1. Then we loop thorugh from second element to second last element and take the previous levels value on the same position and previous position and add those two up. When the iteration is done, we have our triangle. We will return the last row of our triangle.

```python
class Solution:
    def getRow(self, rowIndex: int) -> List[int]:
        rows = [[1]]
        for r in range(1, rowIndex+1):
            rows.append([1] * (r+1))
            for c in range (1, r):
                rows[r][c] = rows[r-1][c]+rows[r-1][c-1]
        return rows[-1]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`