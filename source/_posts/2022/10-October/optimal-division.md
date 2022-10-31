---
extends: _layouts.post
section: content
title: Optimal division
problemUrl: https://leetcode.com/problems/optimal-division/
date: 2022-10-31
categories: [math-and-geometry]
---

Regardless of parentheses, every element is either in the numerator or denominator of the final fraction. The expression nums[0] / ( nums[1] / nums[2] / ... / nums[n-1] ) has every element in the numerator except nums[1], and it is impossible for nums[1] to be in the numerator, so it is the largest. We must also be careful with corner cases.

```python
class Solution:
    def optimalDivision(self, nums: List[int]) -> str:
        nums = list(map(str, nums))
        if len(nums) <= 2:
            return '/'.join(nums)
        return '{}/({})'.format(nums[0], '/'.join(nums[1:]))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

