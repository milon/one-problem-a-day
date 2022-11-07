---
extends: _layouts.post
section: content
title: Wiggle sort II
problemUrl: https://leetcode.com/problems/wiggle-sort-ii/
date: 2022-11-07
categories: [array-and-hashmap]
---

We will sort the array and then split it into two halves. We will iterate over the first half and the second half and insert the elements into the result array.

```python
class Solution:
    def wiggleSort(self, nums: List[int]) -> None:
        nums.sort()
        half = len(nums[::2])-1
        nums[::2], nums[1::2] = nums[half::-1], nums[:half:-1]
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(1)`