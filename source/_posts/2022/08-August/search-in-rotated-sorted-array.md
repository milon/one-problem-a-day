---
extends: _layouts.post
section: content
title: Search in rotated sorted array
problemUrl: https://leetcode.com/problems/search-in-rotated-sorted-array/
date: 2022-08-04
categories: [binary-search]
---

We will do a binary search, but when we devide each it to the mid pointer, we will check, if the value at left pointer is less that value of right pointer. In that case, this part of the list is already sorted. Then we do regular binary search, if not, then we check whether the target is in the range of mid and left/right pointer and forward with that.

```python
class Solution:
    def search(self, nums: List[int], target: int) -> int:
        l, r = 0, len(nums)-1
        
        while l <= r:
            m = (l+r) // 2
            
            if target == nums[m]:
                return m
            
            # left sorted portion
            if nums[l] <= nums[m]:
                if target > nums[m] or target < nums[l]:
                    l = m+1
                else:
                    r = m-1
            
            # right sorted portion
            else:
                if target < nums[m] or target > nums[r]:
                    r = m-1
                else:
                    l = m+1
        return -1
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`