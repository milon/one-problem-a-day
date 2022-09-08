---
extends: _layouts.post
section: content
title: Combination sum III
problemUrl: https://leetcode.com/problems/combination-sum-iii/
date: 2022-09-08
categories: [backtracing]
---

We will run DFS towards our decision tree, for building a decision tree, we have 2 options, either we take the number or we skip the number. We will check when the sum of the numbers we took is equal to n and we took exactly k numbers starting from 1, then we add that to our result, otherwise we backtrack and take another path. Finally we will return our result once the traversal of the decision tree is done.

```python
class Solution:
    def combinationSum3(self, k: int, n: int) -> List[List[int]]:
        candidates = range(1, 10)
        res = []
        
        def dfs(i, current, total):
            if total == n and len(current) == k:
                res.append(current.copy())
                return
            if i >= 10 or total > n:
                return
            
            current.append(i)
            dfs(i+1, current, total+i)
            current.pop()
            dfs(i+1, current, total)
        
        dfs(1, [], 0)
        return res
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(1)`