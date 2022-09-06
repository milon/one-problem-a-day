---
extends: _layouts.post
section: content
title: Sort an array
problemUrl: https://leetcode.com/problems/sort-an-array/
date: 2022-09-06
categories: [array-and-hashmap]
---

We will use divide and conquar to solve this sorting porblem. We will be using classic merge sort.

```python
class Solution:
    def sortArray(self, nums: List[int]) -> List[int]:
        def merge(left, right):
            res = []
            l, r = 0, 0
            while l < len(left) and r < len(right):
                if left[l] <= right[r]:
                    res.append(left[l])
                    l += 1
                else:
                    res.append(right[r])
                    r += 1
            
            while l < len(left):
                res.append(left[l])
                l += 1
            while r < len(right):
                res.append(right[r])
                r += 1
            
            return res
        
        def mergeSort(nums):
            if len(nums) <= 1:
                return nums
            
            m = len(nums)//2
            left = mergeSort(nums[:m])
            right = mergeSort(nums[m:])
            return merge(left, right)
        
        return mergeSort(nums)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(nlog(n))`