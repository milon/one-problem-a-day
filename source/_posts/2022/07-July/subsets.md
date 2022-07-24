---
extends: _layouts.post
section: content
title: Subsets
problemUrl: https://leetcode.com/problems/subsets/
date: 2022-07-23
categories: [backtracking]
---

We will do backtracking to solve the result. For each element of the list, we have 2 option, either we take the element or we leave the element. From this base case, if we run dfs for from the beginning, we will get all the subsets for the list.

```python
class Solution:
    def subsets(self, nums: List[int]) -> List[List[int]]:
        res = []
        subset = []

        def backtrack(index: int) -> None:
            if index >= len(nums):
                res.append(subset.copy())
                return

            # include nums[index]
            subset.append(nums[index])
            backtrack(index+1)

            # exclude nums[index]
            subset.pop()
            backtrack(index+1)

        backtrack(0)
        return res
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(n)`, as we store directly to the result array, which doesn't count as extra space.