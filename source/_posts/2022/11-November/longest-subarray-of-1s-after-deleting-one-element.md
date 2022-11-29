---
extends: _layouts.post
section: content
title: Longest subarray of 1s after deleting one element
problemUrl: https://leetcode.com/problems/longest-subarray-of-1s-after-deleting-one-element/
date: 2022-11-29
categories: [two-pointers]
---

We will use two pointers to keep track of the start and end of the subarray. We will use a variable to keep track of the number of zeros in the subarray. If the number of zeros is less than or equal to 1, we will increment the end pointer. If the number of zeros is greater than 1, we will increment the start pointer. We will update the maximum length of the subarray at each step.

```python
class Solution:
    def longestSubarray(self, nums: List[int]) -> int:
        k, i = 1, 0
        for j in range(len(nums)):
            k -= nums[j] == 0
            if k < 0:
                k += nums[i] == 0
                i += 1
        return j-i
```

Time complexity: `O(n)`, n is the length of the array <br/>
Space complexity: `O(1)`