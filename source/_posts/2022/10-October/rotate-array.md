---
extends: _layouts.post
section: content
title: Rotate array
problemUrl: https://leetcode.com/problems/rotate-array/
date: 2022-10-02
categories: [two-pointers]
---

This approach is based on the fact that when we rotate the array k times, k%nk elements from the back end of the array come to the front and the rest of the elements from the front shift backwards.

In this approach, we firstly reverse all the elements of the array. Then, reversing the first k elements followed by reversing the rest n-k elements gives us the required result.

```python
class Solution:
    def rotate(self, nums: List[int], k: int) -> None:
        k = k % len(nums)
        self.reverse(nums,0,len(nums)-1)
        self.reverse(nums,0, k-1)
        self.reverse(nums,k, len(nums)-1)
    
    def reverse(self, nums, l, r):
        while l<r:
            nums[l], nums[r] = nums[r], nums[l]
            l += 1
            r -= 1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`