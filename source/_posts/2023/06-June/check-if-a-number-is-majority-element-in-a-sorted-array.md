---
extends: _layouts.post
section: content
title: Check if a number is majority element in a sorted array
problemUrl: https://leetcode.com/problems/check-if-a-number-is-majority-element-in-a-sorted-array/
date: 2023-06-07
categories: [binary-search]
---

We can just count the number of times `target` appears in `nums`. If it appears more than `len(nums)//2` times, then it is the majority element.

```python
class Solution:
    def isMajorityElement(self, nums: List[int], target: int) -> bool:
        return nums.count(target) > len(nums)//2
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

We can also use binary search to find the first and last index of `target`. If the difference between the first and last index is greater than `len(nums)//2`, then it is the majority element.

```python
class Solution:
    def isMajorityElement(self, nums: List[int], target: int) -> bool:
        def binarySearch(nums, target, left):
            lo, hi = 0, len(nums)
            while lo < hi:
                mid = (lo + hi) // 2
                if nums[mid] > target or (left and target == nums[mid]):
                    hi = mid
                else:
                    lo = mid+1
            return lo
        left = binarySearch(nums, target, True)
        right = binarySearch(nums, target, False)
        return right - left > len(nums)//2
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`