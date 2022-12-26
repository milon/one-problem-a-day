---
extends: _layouts.post
section: content
title: Shortest unsorted continuous subarray
problemUrl: https://leetcode.com/problems/shortest-unsorted-continuous-subarray/
date: 2022-12-26
categories: [greedy]
---

We will sort the array and find the first and last index where the elements are different.

```python
class Solution:
    def findUnsortedSubarray(self, nums: List[int]) -> int:
        res = [i for (i, (a, b)) in enumerate(zip(nums, sorted(nums))) if a != b]
        return 0 if not res else res[-1] - res[0] + 1
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`