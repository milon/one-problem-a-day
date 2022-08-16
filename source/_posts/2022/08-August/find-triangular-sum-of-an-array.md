---
extends: _layouts.post
section: content
title: Find triangular sum of an array
problemUrl: https://leetcode.com/problems/find-triangular-sum-of-an-array/
date: 2022-08-16
categories: [math-and-geometry]
---

This problem is basically reverse pascal's triangle. For the ith element of one level, we can calculate it from the i and i+1 th element from the previous level and mod the result by 10. After each level, we will remove the last element of that level. We will continue, until there is only one element left in the level, then return that value.

```python
class Solution:
    def triangularSum(self, nums: List[int]) -> int:
        n = len(nums)
        while n > 1:
            for i in range(n-1):
                nums[i] = (nums[i] + nums[i+1]) % 10
            nums.pop()
            n -= 1
        return nums[0]
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`
