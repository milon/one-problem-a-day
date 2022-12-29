---
extends: _layouts.post
section: content
title: Leftmost column with at least a one
problemUrl: https://leetcode.com/problems/leftmost-column-with-at-least-a-one/
date: 2022-12-29
categories: [binary-search]
---

We do a binary search on each of the $m$ rows, finding the earliest `1` on each. On this binary search, we only search the first minCol columns, where minCol is the earliest column where we have found a 1 so far; at first we set minCol = n.

```python
# """
# This is BinaryMatrix's API interface.
# You should not implement it, or speculate about its implementation
# """
#class BinaryMatrix(object):
#    def get(self, row: int, col: int) -> int:
#    def dimensions(self) -> list[]:

class Solution:
    def leftMostColumnWithOne(self, binaryMatrix: 'BinaryMatrix') -> int:
        rows, cols = binaryMatrix.dimensions()
        res = cols
        for r in range(rows):
            low, high = 0, cols
            while low < high:
                mid = (low + high) // 2
                if binaryMatrix.get(r, mid) < 1:
                    low = mid + 1
                else:    
                    high = mid
            res = min(res, low)        
        return res if res < cols else -1 
```

Time complexity: `O(mlog(n))` <br/>
Space complexity: `O(1)`