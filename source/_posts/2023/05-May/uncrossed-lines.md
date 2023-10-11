---
extends: _layouts.post
section: content
title: Uncrossed lines
problemUrl: https://leetcode.com/problems/uncrossed-lines/
date: 2023-05-10
categories: [dynamic-programming]
---

We can use top-down dynamic programming to solve the problem. We will use two pointers `i` and `j` to iterate over `A` and `B` respectively. If A[i] == B[j], we will increment both `i` and `j` and add 1 to the result. Otherwise, we will increment `i` and `j` separately and take the maximum of the two results. Finally, we will return the result. We will use a hashmap to store the results of the subproblems.

```python
class Solution:
    def maxUncrossedLines(self, nums1: List[int], nums2: List[int]) -> int:
        def _maxUncrossedLines(i, j, memo):
            if i <= 0 or j <= 0:
                return 0
            if (i, j) in memo:
                return memo[(i, j)]
            
            if nums1[i-1] == nums2[j-1]:
                memo[(i, j)] = 1 + _maxUncrossedLines(i-1, j-1, memo)
            else:
                memo[(i, j)] = max(_maxUncrossedLines(i-1, j, memo), _maxUncrossedLines(i, j-1, memo))
            return memo[(i, j)]
        
        return _maxUncrossedLines(len(nums1), len(nums2), {})
```

Time complexity: `O(m*n)` <br/>
Space complexity: `O(m*n)`
