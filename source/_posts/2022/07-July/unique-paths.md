---
extends: _layouts.post
section: content
title: Unique paths
problemUrl: https://leetcode.com/problems/unique-paths/
date: 2022-07-17
categories: [dynamic-programming]
---

We will first solve it with brute force using recursion and then use memoization to make it efficient. For recursion, we can think about the base case, if our current position is out of bound, then we return 0, if we are at the end block, then there is only 1 way to the destination block, these 2 are our base case. Then we go forward from there.

```python
class Solution:
    def uniquePaths(self, m: int, n: int) -> int:
        def findPaths(r, c, memo):
            if (r, c) in memo:
                return memo[(r, c)]
            if r >= m or c >= n:
                return 0
            if r == m-1 and c == n-1:
                return 1
            memo[(r, c)] = findPaths(r+1, c, memo) + findPaths(r, c+1, memo)
            return memo[(r, c)]

        return findPaths(0, 0, {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`