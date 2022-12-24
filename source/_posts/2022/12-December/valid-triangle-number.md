---
extends: _layouts.post
section: content
title: Valid triangle number
problemUrl: https://leetcode.com/problems/valid-triangle-number/
date: 2022-12-24
categories: [greedy, binary-search]
---

We will sort the array. We will iterate over the array and use two pointers to find the number of valid triangles. We will return the result.

```python
class Solution:
    def triangleNumber(self, nums: List[int]) -> int:
        nums.sort()
        res = 0
        for i in range(len(nums)-1, 1, -1):
            l, r = 0, i-1
            while l < r:
                if nums[l] + nums[r] > nums[i]:
                    res += r - l
                    r -= 1
                else:
                    l += 1
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`
