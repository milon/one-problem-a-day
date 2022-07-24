---
extends: _layouts.post
section: content
title: Permutations II
problemUrl: https://leetcode.com/problems/permutations-ii/
date: 2022-07-24
categories: [backtracking]
---

First we will count the number of each element, then we create our decision tree, if we take one element, then we remove that element form our count hashmap. If it has multiple instance, we reduce it's count by 1. We will take every element and that will create one permutations. We will take each possible route from root to leaf to get all the permutations.

```python
class Solution:
    def permuteUnique(self, nums: List[int]) -> List[List[int]]:
        res = []
        perm = []
        count = collections.Counter(nums)
        
        def dfs():
            if len(perm) == len(nums):
                res.append(perm.copy())
                return
            
            for n in count:
                if count[n] > 0:
                    perm.append(n)
                    count[n] -= 1
                    
                    dfs()
                    
                    count[n] += 1
                    perm.pop()
        dfs()
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`