---
extends: _layouts.post
section: content
title: Minimum initial energy to finish tasks
problemUrl: https://leetcode.com/problems/minimum-initial-energy-to-finish-tasks/
date: 2022-12-20
categories: [greedy]
---

We will sort the tasks by the difference between the cost and the energy. We will iterate through the tasks and keep track of the current energy. If the current energy is less than the cost of the task, we will add the difference to the initial energy. We will return the initial energy.

```python
class Solution:
    def minimumEffort(self, tasks: List[List[int]]) -> int:
        tasks.sort(key=lambda t: t[0]-t[1])
        res, cur = 0, 0
        for actual, minimum in tasks:
            if minimum > cur:
                res += (minimum - cur)
                cur = minimum
            cur -= actual
        return res
```

Time complexity: `O(nlog(n))` where `n` is the length of `tasks`. <br/>
Space complexity: `O(1)`