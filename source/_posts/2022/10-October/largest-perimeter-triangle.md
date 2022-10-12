---
extends: _layouts.post
section: content
title: Largest perimeter triangle
problemUrl: https://leetcode.com/problems/largest-perimeter-triangle/
date: 2022-10-12
categories: [math-and-geometry]
---

We will sort the array in descending order and check if the sum of the first three numbers is greater than the sum of the next three numbers. If it is, we return the sum of the first three numbers. Otherwise, we return the sum of the next three numbers.

```python
class Solution:
    def largestPerimeter(self, nums: List[int]) -> int:
        nums.sort(reverse=True)
        while len(nums)>=3 and nums[0]>=nums[1]+nums[2]:
            nums.pop(0)
        return 0 if len(nums)<3 else sum(nums[:3])
```

Time Complexity: `O(nlogn)` <br/>
Space Complexity: `O(1)`