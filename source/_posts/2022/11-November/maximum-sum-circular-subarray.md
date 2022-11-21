---
extends: _layouts.post
section: content
title: Maximum sum circular subarray
problemUrl: https://leetcode.com/problems/maximum-sum-circular-subarray/
date: 2022-11-21
categories: [array-and-hashmap]
---

We will use Kadane's algorithm to find the maximum subarray sum. Then, we will find the minimum subarray sum and subtract it from the total sum of the array. If the total sum is greater than the maximum subarray sum, then we will return the total sum. Otherwise, we will return the maximum subarray sum.

```python
class Solution:
    def maxSubarraySumCircular(self, nums: List[int]) -> int:
        max_sum = nums[0]
        min_sum = nums[0]
        total_sum = nums[0]
        curr_max = nums[0]
        curr_min = nums[0]
        
        for i in range(1, len(nums)):
            curr_max = max(nums[i], curr_max + nums[i])
            max_sum = max(max_sum, curr_max)
            
            curr_min = min(nums[i], curr_min + nums[i])
            min_sum = min(min_sum, curr_min)
            
            total_sum += nums[i]
            
        if total_sum == min_sum:
            return max_sum
        return max(max_sum, total_sum - min_sum)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`