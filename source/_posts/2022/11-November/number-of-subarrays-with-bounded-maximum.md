---
extends: _layouts.post
section: content
title: Number of subarrays with bounded maximum
problemUrl: https://leetcode.com/problems/number-of-subarrays-with-bounded-maximum/
date: 2022-11-13
categories: [two-pointers]
---

We will use two pointers for get the range. `l` is the left side of our sliding window, and r is the right side of our sliding window. We increment the size of our window (we increment `r`) if the encountered number is >= left. However, if the number is greater than right, we need to shrink the window to size 0, so we advance the left pointer to position `i`.

```python
class Solution:
    def numSubarrayBoundedMax(self, nums: List[int], left: int, right: int) -> int:
        l, r, res = -1, -1, 0
        for i, num in enumerate(nums):
            if num >= left: r = i
            if num > right: l = i
            res += r - l
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`