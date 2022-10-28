---
extends: _layouts.post
section: content
title: Max consecutive ones III
problemUrl: https://leetcode.com/problems/max-consecutive-ones-iii/
date: 2022-10-28
categories: [sliding-window]
---

We basically need to find the longest subarray with at most k zeros. We can use the sliding window technique to get that.

```python
class Solution:
    def longestOnes(self, nums: List[int], k: int) -> int:
        i = 0
        for j in range(len(nums)):
            k -= 1-nums[j]
            if k < 0:
                k += 1-nums[i]
                i += 1
        return j-i+1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`