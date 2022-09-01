---
extends: _layouts.post
section: content
title: Minimum moves to equal array elements
problemUrl: https://leetcode.com/problems/minimum-moves-to-equal-array-elements/
date: 2022-09-01
categories: [math-and-geometry]
---

Elevating n-1 elements is essensially same as decreasing 1 element. Thus we must decrease everything to the minimum value to get the result.

```python
class Solution:
    def minMoves(self, nums: List[int]) -> int:
        minimum = min(nums)
        count = 0
        for num in nums:
            count += num - minimum
        return count
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`