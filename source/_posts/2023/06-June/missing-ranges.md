---
extends: _layouts.post
section: content
title: Missing ranges
problemUrl: https://leetcode.com/problems/missing-ranges/
date: 2023-06-14
categories: [array-and-hashmap]
---

We will add 2 numbers to the existing array `lower-1` and `upper+1` which will be the lower and upper bound of the range to avoid edge cases. Then we will iterate over the array and check if the difference between the current number and the previous number is greater than 1. If it is greater than 1 then we will add the range to the result.

```python
class Solution:
    def findMissingRanges(self, nums: List[int], lower: int, upper: int) -> List[List[int]]:
        nums = [lower-1] + nums + [upper+1]
        
        res = [] 
        for i in range(1,len(nums)):
            if nums[i] - nums[i-1] > 1:
                res.append([nums[i-1]+1, nums[i]-1])

        return res
```

Time Complexity: `O(n)` where `n` is the length of the array. <br/>
Space Complexity: `O(1)`