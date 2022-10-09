---
extends: _layouts.post
section: content
title: Frequency of the most frequent element
problemUrl: https://leetcode.com/problems/frequency-of-the-most-frequent-element/
date: 2022-10-09
categories: [sliding-window]
---

First we will sort the array. Then it turns into a sliding window problem, the key is to find out the valid condition k + sum >= size * max. For every new element nums[r] to the sliding window, add it to the sum by sum += nums[r]. Check if it'a valid window by sum + k < nums[r] * (r-l+1). If not, removing nums[r] from the window by sum -= nums[l] and l += 1. Keep doing this until we find a valid window. Then we can update the result by res = max(res, r-l+1).

```python
class Solution:
    def maxFrequency(self, nums: List[int], k: int) -> int:
        nums.sort()
        l = 0
        for r in range(len(nums)):
            k += nums[r]
            if k < nums[r] * (r-l+1):
                k -= nums[l]
                l += 1
        return r-l+1
```

Time Complexity: `O(nlogn)` <br/>
Space Complexity: `O(1)`