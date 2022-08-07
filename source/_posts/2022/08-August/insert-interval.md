---
extends: _layouts.post
section: content
title: Insert interval
problemUrl: https://leetcode.com/problems/insert-interval/
date: 2022-08-07
categories: [intervals]
---

We will go through each interval, and compare the end of the new interval with the start of the current interval, if it doesn't collide, then just insert the new interval. Else, merge the interval with the new interval and append it to the result.

```python
class Solution:
    def insert(self, intervals: List[List[int]], newInterval: List[int]) -> List[List[int]]:
        res = []
        
        for i in range(len(intervals)):
            if newInterval[1] < intervals[i][0]:
                res.append(newInterval)
                return res + intervals[i:]
            elif newInterval[0] > intervals[i][1]:
                res.append(intervals[i])
            else:
                newInterval = [
                    min(newInterval[0], intervals[i][0]),
                    max(newInterval[1], intervals[i][1]),
                ]

        res.append(newInterval)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`