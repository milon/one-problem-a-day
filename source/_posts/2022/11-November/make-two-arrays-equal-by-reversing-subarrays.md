---
extends: _layouts.post
section: content
title: Make two arrays equal by reversing subarrays
problemUrl: https://leetcode.com/problems/make-two-arrays-equal-by-reversing-subarrays/
date: 2022-11-15
categories: [array-and-hashmap]
---

We can sort both arrays and compare them. If they are equal, then we can make the two arrays equal by reversing subarrays.

```python
class Solution:
    def canBeEqual(self, target: List[int], arr: List[int]) -> bool:
        return sorted(target) == sorted(arr)
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`