---
extends: _layouts.post
section: content
title: Wiggle sort
problemUrl: https://leetcode.com/problems/wiggle-sort/
date: 2022-12-05
categories: [array-and-hashmap]
---

We will loop over the array, that 2 elements per iteration, then sort 2 elements once ascending and then descending order and swap them. We will do this until we reach the end of the array.

```python
class Solution:
    def wiggleSort(self, nums: List[int]) -> None:
        for i in range(len(nums)):
            nums[i:i+2] = sorted(nums[i:i+2], reverse=i%2)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`