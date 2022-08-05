---
extends: _layouts.post
section: content
title: Combination sum II
problemUrl: https://leetcode.com/problems/combination-sum-ii/
date: 2022-08-05
categories: [backtracking]
---

We will run a DFS for the decision tree and use backtracking if we failed to find a result. As we are bit allowed to use the same items twice, we will keep track of the previous item, and if it is already present in the combination, we will skip it.

```python
class Solution:
    def combinationSum2(self, candidates: List[int], target: int) -> List[List[int]]:
        candidates.sort()
        res = []
        
        prev = -1
        def dfs(pos, total, current):
            if total == 0:
                res.append(current.copy())
            if total < 0:
                return
            
            prev = -1
            for i in range(pos, len(candidates)):
                if candidates[i] == prev:
                    continue
                prev = candidates[i]
                current.append(candidates[i])
                dfs(i+1, total-candidates[i], current)
                current.pop()
            
        dfs(0, target, [])
        return res
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(1)`