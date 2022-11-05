---
extends: _layouts.post
section: content
title: Find all numbers disappeared in an array
problemUrl: https://leetcode.com/problems/find-all-numbers-disappeared-in-an-array/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will iterate over the array, and mark the element at the index of the current element as negative. Then we will iterate over the array again, and add the index of the positive element to the result.

```python
class Solution:
    def findDisappearedNumbers(self, nums: List[int]) -> List[int]:
        for num in nums:
            if nums[abs(num)-1] > 0:
                nums[abs(num)-1] *= -1
            
        res = []
        for i, num in enumerate(nums):
            if num > 0:
                res.append(i+1)
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`