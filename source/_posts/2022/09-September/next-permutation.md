---
extends: _layouts.post
section: content
title: Next permutation
problemUrl: https://leetcode.com/problems/next-permutation/
date: 2022-09-01
categories: [array-and-hashmap]
---

We will take a pointer at the end of the list and move towards front until we a bigger value than the previous. If we reach all the way till the beginning, the the list is already in decreasing order, we can just return the reversed list. Then we take another pointer from the end, move it towards the beginning until we get a value less than or equal to our first pointer. Then we replace the position between this 2 pointer. Finally we reverse the list from first pointer till the end of the list. As we are doing everything in place, we are not returning anything.

```python
class Solution:
    def nextPermutation(self, nums: List[int]) -> None:
        i = len(nums)-1
        while i > 0 and nums[i-1] >= nums[i]:
            i -= 1
        if i == 0:  # already in decreasing order
            return nums.reverse()
        
        j = len(nums)-1
        while nums[j] <= nums[i-1]:
            j -= 1
        nums[i-1], nums[j] = nums[j], nums[i-1]
        
        nums[i:] = nums[len(nums)-1:i-1:-1]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`

