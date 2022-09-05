---
extends: _layouts.post
section: content
title: Search in rotated sorted array II
problemUrl: https://leetcode.com/problems/search-in-rotated-sorted-array-ii/
date: 2022-09-05
categories: [binary-search]
---

To solve this problem we have to follow the folllowing steps:

1. Calculate the mid index.
2. Check if the mid element == target, return True else move to next step. 
3. Else if the mid element >= left. If mid element >= target and and left <= target, then shift right to mid-1 position, else shift left to mid+1 position.
4. If target >= mid element and target <=right, then shift left to mid+1 position, else shift right to mid-1 position.
5. If the element is not found return False

Note: Since duplicate elemnts are present in the array so remove all the duplicates before step 1.

```python
class Solution:
    def search(self, nums: List[int], target: int) -> bool:
        if len(nums) == 1:
            if nums[0] == target:
                return True
            return False
        
        l, r = 0, len(nums)-1
        while l <= r:
            # shifting to remove duplicate elements
            while l<r and nums[l] == nums[l+1]:
                l += 1
            while l<r and nums[r] == nums[r-1]:
                r -= 1
            
            # step 1 calculate the mid 
            mid=(l+r)//2
            
            # step 2
            if nums[mid] == target:
                return True
            # step 3
            elif nums[l] <= nums[mid]:
                if nums[mid]>=target and nums[l]<=target:
                    r = mid-1
                else:
                    l = mid+1
            # step 4
            else:
                if nums[mid]<=target and nums[r]>=target:
                    l = mid+1
                else:
                    r = mid-1
        # step 5
        return False
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`