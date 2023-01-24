---
extends: _layouts.post
section: content
title: Find minimum time to finish all jobs II
problemUrl: https://leetcode.com/problems/find-minimum-time-to-finish-all-jobs-ii/
date: 2023-01-24
categories: [greedy]
---

We can be greedy about the solution. We will sort all the workers and jobs, then iterate together to find the minimum time. We will start with the biggest worker and the biggest job. If the worker can do the job, we will assign it to him and move to the next job. If the worker can't do the job, we will move to the next worker. If we can't find a worker for the job, we will move to the next job. We will repeat this process until we assign all jobs. The time complexity of this solution is `O(nlog(n))`, n is the length of the array.

```python
class Solution:
    def minimumTime(self, jobs: List[int], workers: List[int]) -> int:
        return max(math.ceil(j/w) for j, w in zip(sorted(jobs), sorted(workers)))
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`