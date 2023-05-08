---
extends: _layouts.post
section: content
title: Valid boomerang
problemUrl: https://leetcode.com/problems/valid-boomerang/
date: 2023-05-08
categories: [math-and-geometry]
---

We will calculate the slope of the line between the first and second point and the slope of the line between the first and third point. If the slope of the first and second point is the same as the slope of the first and third point, then the three points are on the same line. Otherwise, the three points are not on the same line. Finally, we will return the result.

```python
class Solution:
    def isBoomerang(self, points: List[List[int]]) -> bool:
        x1, y1 = points[0]
        x2, y2 = points[1]
        x3, y3 = points[2]
        return (y2-y1) * (x3-x1) != (y3-y1) * (x2-x1)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`
