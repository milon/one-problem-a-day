---
extends: _layouts.post
section: content
title: Subsets II
problemUrl: https://leetcode.com/problems/subsets-ii/
date: 2022-07-24
categories: [backtracking]
---

We will first sort the element. Then like the original subset problem, we will have 2 choice for each element, either choose it or skip it. As we don't want duplicate subset, we will skip the same character from the list.

```python
class Solution:
    def subsetsWithDup(self, nums: List[int]) -> List[List[int]]:
        nums.sort()
        res = []

        def backtrack(i: int, subset: List[int]):
            if i == len(nums):
                res.append(subset[:])   # deep copy of subset
                return

            # All subsets that include nums[i]
            subset.append(nums[i])
            backtrack(i+1, subset)
            subset.pop()

            # All subsets that don't include nums[i]
            while i + 1 < len(nums) and nums[i] == nums[i + 1]:
                i += 1  # skipping the dulicate element
            backtrack(i+1, subset)

        backtrack(0, [])
        return res
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(n)`, as we store directly to the result array, which doesn't count as extra space.