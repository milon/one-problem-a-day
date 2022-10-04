---
extends: _layouts.post
section: content
title: Remove covered intervals
problemUrl: https://leetcode.com/problems/remove-covered-intervals/
date: 2022-10-04
categories: [intervals]
---

We will sort the intervals by start with ascending order and end at decending order. Then we iterate over each intervals, if the end is greater than a right value, which is initially set as 0, then we add it to the result and replace the end with maximum end value. After the iteration is over, we return the result.

```python
class Solution:
    def removeCoveredIntervals(self, intervals: List[List[int]]) -> int:
        res, right = 0, 0
        intervals.sort(key=lambda x: (x[0], -x[1]))
        for start, end in intervals:
            res += end > right
            right = max(end, right)
        return res
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`