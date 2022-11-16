---
extends: _layouts.post
section: content
title: Minimum time visiting all points
problemUrl: https://leetcode.com/problems/minimum-time-visiting-all-points/
date: 2022-11-16
categories: [greedy]
---

If we go diagonally, we can reach the destination in the minimum time, actually twice as first as moving vertically and horizontally. So, we will find the maximum of the difference between the x and y coordinates and add it to the answer.

```python
class Solution:
    def minTimeToVisitAllPoints(self, points: List[List[int]]) -> int:
        return sum(max(abs(x1 - x2), abs(y1 - y2)) for (x1, y1), (x2, y2) in zip(points, points[1:]))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`