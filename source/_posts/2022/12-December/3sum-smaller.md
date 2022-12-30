---
extends: _layouts.post
section: content
title: 3sum smaller
problemUrl: https://leetcode.com/problems/3sum-smaller/
date: 2022-12-30
categories: [array-and-hashmap]
---

First we will sort the numbers. Then we will use two pointers to find the number of triplets that sum to a smaller value than the target.

```python
class Solution:
    def threeSumSmaller(self, nums: List[int], target: int) -> int:
        nums.sort()
        res = 0
        for i in range(len(nums)-2):
            l, r = i+1, len(nums)-1
            while l < r:
                if nums[i] + nums[l] + nums[r] < target:
                    res += r-l
                    l += 1
                else:
                    r -= 1
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`