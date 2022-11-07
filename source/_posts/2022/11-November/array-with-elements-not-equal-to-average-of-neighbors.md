---
extends: _layouts.post
section: content
title: Array with elements not equal to average of neighbors
problemUrl: https://leetcode.com/problems/array-with-elements-not-equal-to-average-of-neighbors/
date: 2022-11-07
categories: [two-pointers]
---

We will sort the array. Then take 2 elements in pair at a time, swap their positions and then return it after the loop is finished.

```python
class Solution:
    def rearrangeArray(self, nums: List[int]) -> List[int]:
        nums.sort()
        for i in range(1, len(nums), 2):
            nums[i], nums[i-1] = nums[i-1], nums[i]
        return nums
```

Time complexity: `O(nlogn)`
Space complexity: `O(1)`