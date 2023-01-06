---
extends: _layouts.post
section: content
title: Most profit assigning work
problemUrl: https://leetcode.com/problems/most-profit-assigning-work/
date: 2023-01-06
categories: [greedy, two-pointers]
---

We will zip together difficulty and profit as jobs and sort them by difficulty. Then we will sort workers. For each worker, we will find the maximum profit he can make under his ability. The maximum profit he can make is the maximum profit of the job with the highest difficulty that is less than or equal to his ability.

```python
class Solution:
    def maxProfitAssignment(self, difficulty: List[int], profit: List[int], worker: List[int]) -> int:
        jobs = sorted(zip(difficulty, profit))
        worker.sort()
        res = i = best = 0
        for ability in worker:
            while i < len(jobs) and ability >= jobs[i][0]:
                best = max(best, jobs[i][1])
                i += 1
            res += best
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`