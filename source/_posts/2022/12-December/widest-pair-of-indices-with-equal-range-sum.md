---
extends: _layouts.post
section: content
title: Widest pair of indices with equal range sum
problemUrl: https://leetcode.com/problems/widest-pair-of-indices-with-equal-range-sum/
date: 2022-12-16
categories: [array-and-hashmap]
---

We will use a prefix sum approach to solve this problem. We will create a prefix sum array. We will create a hashmap. We will iterate through the prefix sum array. We will calculate the difference between the current prefix sum and the target. We will check if the difference is in the hashmap. We will update the maximum width. We will return the maximum width.

```python
class Solution:
    def widestPairOfIndices(self, nums1: List[int], nums2: List[int]) -> int:
        res, prefix = 0, 0
        seen = {0: -1}
        for i in range(len(nums1)):
            prefix += nums1[i] - nums2[i]
            if prefix in seen: 
                res = max(res, i - seen[prefix])
            seen.setdefault(prefix, i)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`