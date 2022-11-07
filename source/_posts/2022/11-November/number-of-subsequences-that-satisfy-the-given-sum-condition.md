---
extends: _layouts.post
section: content
title: Number of subsequences that satisfy the given sum condition
problemUrl: https://leetcode.com/problems/number-of-subsequences-that-satisfy-the-given-sum-condition/
date: 2022-11-07
categories: [two-pointers]
---

We will sort the array and use two pointers to find the number of subsequences that satisfy the given sum condition.

```python
class Solution:
    def numSubseq(self, nums: List[int], target: int) -> int:
        nums.sort()
        left, right = 0, len(nums) - 1
        res = 0
        while left <= right:
            if nums[left] + nums[right] <= target:
                res += 2 ** (right - left)
                left += 1
            else:
                right -= 1
        return res % (10 ** 9 + 7)
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(1)`