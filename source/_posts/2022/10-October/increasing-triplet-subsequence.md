---
extends: _layouts.post
section: content
title: Increasing triplet subsequence
problemUrl: https://leetcode.com/problems/increasing-triplet-subsequence/
date: 2022-10-11
categories: [greedy]
---

We will keep track of the smallest and second smallest number in the array. If we find a number that is greater than both, we return true. Otherwise, we return false.

```python
class Solution:
    def increasingTriplet(self, nums: List[int]) -> bool:
        first = second = math.inf
        for third in nums:
            if third <= first:
                first = third
            elif third <= second:
                second = third
            else:
                return True
        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`