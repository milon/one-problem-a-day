---
extends: _layouts.post
section: content
title: Out of boundary paths
problemUrl: https://leetcode.com/problems/out-of-boundary-paths/
date: 2022-12-26
categories: [dynamic-programming]
---

We will solve the problem recursively. We will use a memo to store the number of paths from `(i, j)` to `(m, n)`.

```python
class Solution:
    def findPaths(self, m: int, n: int, maxMove: int, startRow: int, startColumn: int) -> int:
        def _findPaths(i, j, maxMove, memo):
            if (i, j, maxMove) in memo:
                return memo[(i, j, maxMove)]
            
            if maxMove < 0: 
                return 0
            
            if i < 0 or i >= m or j < 0 or j >= n: 
                return 1

            a = _findPaths(i-1, j, maxMove-1, memo)
            b = _findPaths(i+1, j, maxMove-1, memo)
            c = _findPaths(i, j-1, maxMove-1, memo)
            d = _findPaths(i, j+1, maxMove-1, memo)
            
            memo[(i, j, maxMove)] = a + b + c + d
            return memo[(i, j, maxMove)]
        
        return _findPaths(startRow, startColumn, maxMove, {}) % (10**9+7)
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`