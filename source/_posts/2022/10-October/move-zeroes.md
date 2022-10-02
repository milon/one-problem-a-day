---
extends: _layouts.post
section: content
title: Move zeroes
problemUrl: https://leetcode.com/problems/move-zeroes/
date: 2022-10-02
categories: [two-pointers]
---

We will take a simple two pointers approach, the left will be the first index. Then we iterate over the array, and every time we find a zero, we change the position of it with the next character until we reach the end or another zero.

```python
class Solution:
    def moveZeroes(self, nums: List[int]) -> None:
        l = 0
        for r in range(len(nums)):
            if nums[r] != 0:
                nums[l], nums[r] = nums[r], nums[l]
                l += 1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`