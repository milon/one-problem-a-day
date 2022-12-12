---
extends: _layouts.post
section: content
title: Average waiting time
problemUrl: https://leetcode.com/problems/average-waiting-time/
date: 2022-12-12
categories: [intervals, array-and-hashmap]
---

We will keep on iterating over the intervals and we will check whether the current interval can be served. If it can be served, we will update the current time to be the maximum of the current time and the arrival time of the current interval. We will add the current time to the waiting time. We will update the current time to be the current time plus the duration of the current interval. We will keep on doing this until we have served all the intervals. At the end, we will return the average waiting time.

```python
class Solution:
    def averageWaitingTime(self, customers: List[List[int]]) -> float:
        cur, wait = 0, 0
        for time, delay in customers:
            cur = max(cur, time) + delay
            wait += cur - time
        return wait / len(customers)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`