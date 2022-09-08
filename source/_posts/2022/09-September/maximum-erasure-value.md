---
extends: _layouts.post
section: content
title: Maximum erasure value
problemUrl: https://leetcode.com/problems/maximum-erasure-value/
date: 2022-09-08
categories: [sliding-window]
---

We will use a set to keep track of repeating numbers. We will have 2 pointers, we will move our right pointer, check if the number as right pointer is already exist in the set, if exists, then we remove number from left until the number is removed, also updating the left pointer position and the current sum in the process. We will keep track of the current sum of the set to get the maximum value and return it after right pointer moves to the end of the input number list.

```python
class Solution:
    def maximumUniqueSubarray(self, nums: List[int]) -> int:
        res, maxSum = 0, 0
        l, curSub = 0, set()

        for r in range(len(nums)):
            if nums[r] in curSub:
                while nums[r] in curSub:
                    curSub.remove(nums[l])
                    maxSum -= nums[l]
                    l += 1
                    
            curSub.add(nums[r])
            maxSum += nums[r]
            res = max(res, maxSum)
            
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`