---
extends: _layouts.post
section: content
title: Minimum moves to equal array elements II
problemUrl: https://leetcode.com/problems/minimum-moves-to-equal-array-elements-ii/
date: 2022-09-03
categories: [math-and-geometry]
---

We will first take the median of the array by sorting it and take the middle value, this will be our target. Then we take the difference from each number to the target, add that up and return that as our result.

```python
class Solution:
    def minMoves2(self, nums: List[int]) -> int:
        target = sorted(nums)[len(nums)//2]
        
        res = 0
        for num in nums:
            res += abs(num - target)
        return res
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`