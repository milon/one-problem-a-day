---
extends: _layouts.post
section: content
title: Unique binary search trees
problemUrl: https://leetcode.com/problems/unique-binary-search-trees/
date: 2022-09-04
categories: [dynamic-programming]
---

We will take the top-down approach to solve the problem. We will start from 1 and for every position, we take is as root, and build a tree with the left and right subarray for that root position, and add that to our result. Finally we will memoize it so reduce duplicate calculations.

```python
class Solution:
    def numTrees(self, n: int) -> int:
        def _buildTrees(n, memo):
            if n in memo:
                return memo[n]
            
            if n < 1:
                return 1
            
            total = 0
            for i in range(1, n+1):
                left = i-1
                right = n-i
                total += _buildTrees(left, memo) * _buildTrees(right, memo)
            
            memo[n] = total
            return memo[n]
        
        return _buildTrees(n, {})
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`