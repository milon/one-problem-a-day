---
extends: _layouts.post
section: content
title: Non overlapping intervals
problemUrl: https://leetcode.com/problems/non-overlapping-intervals/
date: 2022-08-07
categories: [intervals]
---

First we will sort the intervals. Then we will iterate through all the intervals, compare if we have any collision between 2 consecutive interval, if yes, then we will count that, then after the iteration is done, return that count.

```python
class Solution:
    def eraseOverlapIntervals(self, intervals: List[List[int]]) -> int:
        intervals.sort()
        res = 0
        prevEnd = intervals[0][1]
        for start, end in intervals[1:]:
            if start >= prevEnd:
                prevEnd = end
            else:
                res += 1
                prevEnd = min(end, prevEnd)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`