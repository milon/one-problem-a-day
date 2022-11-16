---
extends: _layouts.post
section: content
title: Minimum distance to the target element
problemUrl: https://leetcode.com/problems/minimum-distance-to-the-target-element/
date: 2022-11-16
categories: [array-and-hashmap]
---

We will iterate over all the elements and find the minimum distance.

```python
class Solution:
    def getMinDistance(self, nums: List[int], target: int, start: int) -> int:
        return min(abs(i - start) for i, num in enumerate(nums) if num == target)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`