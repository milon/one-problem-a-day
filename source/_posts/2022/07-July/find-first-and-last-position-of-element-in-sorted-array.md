---
extends: _layouts.post
section: content
title: Find first and last position of element in sorted array
problemUrl: https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array/
date: 2022-07-25
categories: [binary-search]
---

We will first do a regular binary search to get the position of the target. Then we expand both ways to get the left and right position of the target and return that. If we can't find the target we return [-1, -1].

```python
class Solution:
    def searchRange(self, nums: List[int], target: int) -> List[int]:
        left, right = 0, len(nums)-1
        while left <= right:
            mid = (left+right)//2
            if nums[mid] > target:
                right = mid-1
            elif nums[mid] < target:
                left = mid+1
            else:
                l, r = mid, mid
                
                while l >= 0:
                    if nums[l] != target:
                        break
                    l -= 1
                
                while r <= len(nums)-1:
                    if nums[r] != target:
                        break
                    r += 1
                
                return [l+1, r-1]
            
        return [-1, -1]
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`