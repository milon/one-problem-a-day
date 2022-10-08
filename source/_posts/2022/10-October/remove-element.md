---
extends: _layouts.post
section: content
title: Remove element
problemUrl: https://leetcode.com/problems/remove-element/
date: 2022-10-08
categories: [array-and-hashmap]
---

We will take a pointer at the beginning of the array, then iterate over the whole array. If the value doesn't match the given values, we assing it to the pointer's position of the array and then forward it position. Finally return the pointer position as result.

```python
class Solution:
    def removeElement(self, nums: List[int], val: int) -> int:
        i = 0
        for num in nums:
            if num != val:
                nums[i] = num
                i += 1
        return i
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`
