---
extends: _layouts.post
section: content
title: Max points on a line
problemUrl: https://leetcode.com/problems/max-points-on-a-line/
date: 2023-01-08
categories: [math-and-geometry]
---

We will calculate the slope of each pair of points. If the slope is the same, we will increase the count. If the slope is different, we will update the maximum count.

```python
class Solution:
    def maxPoints(self, points: List[List[int]]) -> int:
        if len(points) <= 2:
            return len(points)
        
        def slope(p1: List[int], p2: List[int]) -> int:
            if p2[0]-p1[0] == 0:
                return math.inf
            return (p2[1]-p1[1]) / (p2[0]-p1[0])
        
        res = 0
        for i in range(len(points)):
            count = collections.defaultdict(int)
            for j in range(i+1,len(points)):
                count[slope(points[i], points[j])] += 1
            if count:
                res = max(res, max(count.values()))
        
        return res+1
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`