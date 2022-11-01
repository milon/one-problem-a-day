---
extends: _layouts.post
section: content
title: Minimum swaps to group all 1s together II
problemUrl: https://leetcode.com/problems/minimum-swaps-to-group-all-1s-together-ii/
date: 2022-11-01
categories: [sliding-window]
---

We will count number of ones in nums, let the number of ones be stored in the variable `ones`. Append nums to nums because we have to look at it as a circular array. Find the maximum number of ones in a window of size ones in the new array. Number of swaps = ones - maximum number of ones in a window of size ones.

```python
class Solution:
    def minSwaps(self, nums: List[int]) -> int:
        ones, n = nums.count(1), len(nums)
        x, onesInWindow = 0, 0
        for i in range(n * 2):
            if i >= ones and nums[i % n - ones]: 
                x -= 1
            if nums[i % n] == 1: 
                x += 1
            onesInWindow = max(x, onesInWindow)
        return ones - onesInWindow
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`