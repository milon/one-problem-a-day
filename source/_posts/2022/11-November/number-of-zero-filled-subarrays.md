---
extends: _layouts.post
section: content
title: Number of zero filled subarrays
problemUrl: https://leetcode.com/problems/number-of-zero-filled-subarrays/
date: 2022-11-12
categories: [math-and-geometry]
---

We will iterate over each number, if the number is zero, we will add the number of subarrays that can be formed with the previous numbers to the result. We will also add the number of subarrays that can be formed with the previous numbers to the result.

```python
class Solution:
    def zeroFilledSubarray(self, nums: List[int]) -> int:
        res, count = 0, 0
        for num in nums:
            if num != 0:
                count = 0
            else:
                count += 1
            res += count
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`