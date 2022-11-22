---
extends: _layouts.post
section: content
title: Sort colors
problemUrl: https://leetcode.com/problems/sort-colors/
date: 2022-11-22
categories: [two-pointers, array-and-hashmap]
---

We will use two pointers to keep track of the start and end of the array. Then, we will iterate through the array. If the number is 0, then we will swap the number at the start pointer with the number at the current index. Then, we will increment the start pointer. If the number is 2, then we will swap the number at the end pointer with the number at the current index. Then, we will decrement the end pointer. If the number is 1, then we will increment the current index.

```python
class Solution:
    def sortColors(self, nums: list[int]) -> None:
        smaller, equal, larger = 0, 0, len(nums)
        
        while equal < larger:
            if nums[equal] == 0:
                nums[smaller], nums[equal] = nums[equal], nums[smaller]
                smaller += 1
                equal += 1
            elif nums[equal] == 2:
                larger -= 1
                nums[larger], nums[equal] = nums[equal], nums[larger]
            else:
                equal += 1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`