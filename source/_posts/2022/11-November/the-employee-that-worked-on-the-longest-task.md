---
extends: _layouts.post
section: content
title: The employee that worked on the longest task
problemUrl: https://leetcode.com/problems/the-employee-that-worked-on-the-longest-task/
date: 2022-11-24
categories: [array-and-hashmap]
---

We will iterate over the logs, and for each log, we will update the start time and end time of the employee. We will also update the longest task time of the employee. After iterating over the logs, we will iterate over the employees to find the employee that worked on the longest task.

```python

```python
class Solution:
    def hardestWorker(self, n: int, logs: List[List[int]]) -> int:
        res = logs[0][0]
        maxTime = logs[0][1]
        for i in range(1, len(logs)):
            if logs[i][1]-logs[i-1][1] > maxTime:
                res = logs[i][0]
                maxTime = logs[i][1]-logs[i-1][1]
            elif logs[i][1]-logs[i-1][1] == maxTime and res>logs[i][0]:
                res = logs[i][0]
        return res
```

Time complexity: `O(n)`, n is the length of logs <br/>
Space complexity: `O(1)`