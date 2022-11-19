---
extends: _layouts.post
section: content
title: Number of ways to split array
problemUrl: https://leetcode.com/problems/number-of-ways-to-split-array/
date: 2022-11-19
categories: [array-and-hashmap]
---

We will keep track of the left sum and right sum of the array. Then we iterate over each element until the last element, and we will check if the left sum is equal to the right sum. If yes, we will increment the result by 1. We will continue this process until we reach the end of the array.

```python
class Solution:
    def waysToSplitArray(self, nums: List[int]) -> int:
        lSum, rSum = 0, sum(nums)
        res = 0
        for num in nums[:-1]:
            lSum += num
            rSum -= num
            if lSum >= rSum:
                res += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
