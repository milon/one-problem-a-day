---
extends: _layouts.post
section: content
title: Minimum difficulty of a job schedule
problemUrl: https://leetcode.com/problems/minimum-difficulty-of-a-job-schedule/
date: 2022-10-16
categories: [dynamic-programming]
---

We will apply DFS to find the the minimum difficulty if start work at ith job with `d` days left. If d = 1, only one day left, we have to do all jobs, return the maximum difficulty of jobs. Then we will use memoization to store the result of each subproblem.

```python
class Solution:
    def minDifficulty(self, jobDifficulty: List[int], d: int) -> int:
        if len(jobDifficulty) < d:
            return -1
        
        def dfs(i, d, memo):
            if (i, d) in memo:
                return memo[(i, d)]
            if d == 1:
                memo[(i, d)] = max(jobDifficulty[i:])
                return memo[(i, d)]
            res, maxd = math.inf, 0
            for j in range(i, len(jobDifficulty)-d+1):
                maxd = max(maxd, jobDifficulty[j])
                res = min(res, maxd + dfs(j+1, d-1, memo))
            memo[(i, d)] = res
            return memo[(i, d)]
        
        return dfs(0, d, {})
```

Time Complexity: `O(n^2*d)`, n is the number of job difficulties <br/>
Space Complexity: `O(nd)`

