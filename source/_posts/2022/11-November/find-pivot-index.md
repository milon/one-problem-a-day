---
extends: _layouts.post
section: content
title: Find pivot index
problemUrl: https://leetcode.com/problems/find-pivot-index/
date: 2022-11-05
categories: [array-and-hashmap]
---

We will iterate over the array, and calculate the sum of the left and right side of the current index. If the sum of the left side is equal to the sum of the right side, we will return the current index.

```python
class Solution:
    def pivotIndex(self, nums: List[int]) -> int:
        left, right = 0, sum(nums)
        for i, num in enumerate(nums):
            right -= num
            if left == right:
                return i
            left += num
        return -1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`