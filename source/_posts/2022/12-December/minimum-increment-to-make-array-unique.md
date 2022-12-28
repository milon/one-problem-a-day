---
extends: _layouts.post
section: content
title: Minimum increment to make array unique
problemUrl: https://leetcode.com/problems/minimum-increment-to-make-array-unique/
date: 2022-12-28
categories: [greedy]
---

We will sort the array and iterate over the array. If the current element is smaller than the previous element, we will increment the current element to the previous element plus one.

```python
class Solution:
    def minIncrementForUnique(self, nums: List[int]) -> int:
        nums.sort()
        res = 0
        for i in range(1, len(nums)):
            if nums[i] <= nums[i-1]:
                res += nums[i-1] - nums[i] + 1
                nums[i] = nums[i-1] + 1
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`
