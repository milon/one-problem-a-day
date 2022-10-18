---
extends: _layouts.post
section: content
title: Reduction operations to make the array elements equal
problemUrl: https://leetcode.com/problems/reduction-operations-to-make-the-array-elements-equal/
date: 2022-10-18
categories: [greedy]
---

We will sort the array in descending order, then iterate over the array and count the number of elements that are less than the current element. Finally return the sum of the counts.

```python
class Solution:
    def reductionOperations(self, nums: List[int]) -> int:
        nums.sort()
        n = len(nums)
        res = 0
        for i in range(n-1):
            if nums[i] != nums[i+1]:
                res += n-1-i
        return res
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`