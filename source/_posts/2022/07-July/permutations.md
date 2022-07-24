---
extends: _layouts.post
section: content
title: Permutations
problemUrl: https://leetcode.com/problems/permutations/
date: 2022-07-24
categories: [backtracking]
---

We will solve it recursively using backtracking. If there is only one element in the list, permutations of this will return the same list. This will be our base case. If it has 2 elements, we remove one, so it fall into base case, then add the left element with the result to get the new permutations. We will use this approach, remove and then add back elements to get the result of all possible permutations.

```python
class Solution:
    def permute(self, nums: List[int]) -> List[List[int]]:
        res = []
        if len(nums) == 1:
            return [nums[:]] # deep copy of nums
        for i in range(len(nums)):
            n = nums.pop(0)
            perms = self.permute(nums)
            for perm in perms:
                perm.append(n)
            res.extend(perms)
            nums.append(n)
        return res
```

Time Complexity: `O(n*n!)` <br/>
Space Complexity: `O(n!)`