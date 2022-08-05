---
extends: _layouts.post
section: content
title: Find minimum in rotated sorted array
problemUrl: https://leetcode.com/problems/find-minimum-in-rotated-sorted-array/
date: 2022-08-04
categories: [binary-search]
---

We will start by assuming the minimum number is fisrt element of the list. Then we will do a binary search, but before calculating the mid value, we will check, if the value at left pointer is less that value of right pointer. In that case, this part of the list is already sorted, and we can just pick the minimum value from here. Otherwise, we will run our regular binary search iteration.

```python
class Solution:
    def findMin(self, nums: List[int]) -> int:
        res = nums[0]
        l, r = 0 , len(nums)-1
        while l <= r:
            if nums[l] < nums[r]:
                res = min(res, nums[l])
                break
            m = (l + r) // 2
            res = min(res, nums[m])
            if nums[m] >= nums[l]:
                l = m + 1
            else:
                r = m - 1
        return res
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`