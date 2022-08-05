---
extends: _layouts.post
section: content
title: Combination sum
problemUrl: https://leetcode.com/problems/combination-sum/
date: 2022-08-05
categories: [backtracking]
---

Basically, we have 2 ways to built the decision tree, either take the number or skip it. We are going to use backtracking to calculate the problem.

```python
class Solution:
    def combinationSum(self, candidates: List[int], target: int) -> List[List[int]]:
        res = []

        def dfs(i, cur, total):
            if total == target:
                res.append(cur.copy())
                return
            if i >= len(candidates) or total > target:
                return

            cur.append(candidates[i])
            dfs(i, cur, total + candidates[i])
            cur.pop()
            dfs(i + 1, cur, total)

        dfs(0, [], 0)
        return res
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(1)`