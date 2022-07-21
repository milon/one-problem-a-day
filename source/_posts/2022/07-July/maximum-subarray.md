---
extends: _layouts.post
section: content
title: Maximum subarray
problemUrl: https://leetcode.com/problems/maximum-subarray/
date: 2022-07-21
categories: [greedy]
---

We will have 2 running count, one is for our result and one is for the total of the array. First we assume first element of the input is out result. Then we iterate through the input and calculate total. If total if bigger than our result, we replace result with total. If total is less then 0, then we replace total with 0. After the iteration is done, we return the result.

```python
class Solution:
    def maxSubArray(self, nums: List[int]) -> int:
        res = nums[0] 
        total = 0
        for n in nums:
            total += n
            res = max(res, total)
            if total < 0:
                total = 0
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`