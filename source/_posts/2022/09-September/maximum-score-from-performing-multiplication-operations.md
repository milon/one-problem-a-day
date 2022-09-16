---
extends: _layouts.post
section: content
title: Maximum score from performing multiplication operations
problemUrl: https://leetcode.com/problems/maximum-score-from-performing-multiplication-operations/
date: 2022-09-16
categories: [dynamic-programming]
---

We will start from the beginning of the both array and calculate the left and right value recursively. Then we will compare them and return the highest result. We will then use memoization to reduce redundant calculation.

```python
class Solution:
    def maximumScore(self, nums: List[int], multipliers: List[int]) -> int:
        n, m = len(nums), len(multipliers)
        
        def _maximumScore(i, j, memo):
            if (i, j) in memo:
                return memo[(i, j)]
            
            if j == m:
                return 0
            
            left = _maximumScore(i+1, j+1, memo) + (nums[i] * multipliers[j])
            right = _maximumScore(i, j+1, memo) + (nums[(n-1)-(j-i)] * multipliers[j])
            
            memo[(i, j)] = max(left, right)
            return memo[(i, j)]
        
        return _maximumScore(0, 0, {})
```

Time Complexity: `O(n*m)`, n is the size of nums and m is the size of multipliers <br/>
Space Complexity: `O(n*m)`