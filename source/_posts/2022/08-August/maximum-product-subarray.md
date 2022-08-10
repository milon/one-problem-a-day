---
extends: _layouts.post
section: content
title: Maximum product subarray
problemUrl: https://leetcode.com/problems/maximum-product-subarray/
date: 2022-08-10
categories: [dynamic-programming]
---

We will keep track of minimum and maximum products of each item and keep the current maximum is our result. When the whole traversal is done, we will return the maximum result.

```python
class Solution:
    def maxProduct(self, nums: List[int]) -> int:
        res = max(nums)
        curMin, curMax = 1, 1
        for n in nums:
            temp = n*curMax
            curMax = max(n*curMax, n*curMin, n)
            curMin = min(temp, n*curMin, n)
            res = max(res, curMax)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`