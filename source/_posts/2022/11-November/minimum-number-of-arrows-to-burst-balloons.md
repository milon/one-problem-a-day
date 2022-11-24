---
extends: _layouts.post
section: content
title: Minimum number of arrows to burst balloons
problemUrl: https://leetcode.com/problems/minimum-number-of-arrows-to-burst-balloons/
date: 2022-11-24
categories: [greedy]
---

We can solve it by using greedy algorithm. We can sort the balloons by the end time. We can iterate over the balloons, and for each balloon, we can check if the start time of the balloon is greater than the end time of the previous balloon. If the start time of the balloon is greater than the end time of the previous balloon, we can increase the number of arrows by 1. We can return the number of arrows.

```python
class Solution:
    def findMinArrowShots(self, points: List[List[int]]) -> int:
        points.sort(key=lambda x: x[1])
        res = 0
        prev = -math.inf
        for start, end in points:
            if start > prev:
                res += 1
                prev = end
        return res
```

Time complexity: `O(nlog(n))`, n is the length of points <br/>
Space complexity: `O(1)`