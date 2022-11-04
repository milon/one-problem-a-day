---
extends: _layouts.post
section: content
title: Maximum profit in job scheduling
problemUrl: https://leetcode.com/problems/maximum-profit-in-job-scheduling/
date: 2022-11-04
categories: [dynamic-programming, intervals]
---

We will sort the jobs by their end time. Then we will iterate over the jobs, and for each job, we will find the first job that does not overlap with the current job. We will then take the maximum of the profit of the current job and the profit of the current job + the profit of the first job that does not overlap with the current job.

```python
class Solution:
    def jobScheduling(self, startTime: List[int], endTime: List[int], profit: List[int]) -> int:
        jobs = sorted(zip(startTime, endTime, profit), key=lambda x: x[1])
        dp = [0] * len(jobs)
        dp[0] = jobs[0][2]
        
        for i in range(1, len(jobs)):
            dp[i] = max(jobs[i][2], dp[i-1])
            for j in range(i-1, -1, -1):
                if jobs[j][1] <= jobs[i][0]:
                    dp[i] = max(dp[i], jobs[i][2] + dp[j])
                    break
        
        return dp[-1]
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`

We can also solve the same solution in top down approach and then memoize the solution.

```python
class Solution:
    def jobScheduling(self, startTime: List[int], endTime: List[int], profit: List[int]) -> int:
        n = len(startTime)
        jobs = sorted(list(zip(startTime, endTime, profit)))
        
        def dp(i, memo):
            if i in memo:
                return memo[i]
            
            if i == n: 
                return 0
            
            res = dp(i+1, memo)  # Choice 1: Don't pick

            for j in range(i+1, n+1):
                if j == n or jobs[j][0] >= jobs[i][1]:
                    res = max(res, dp(j, memo) + jobs[i][2])  # Choice 2: Pick
                    break

            memo[i] = res
            return memo[i]
        
        return dp(0, {})
```

