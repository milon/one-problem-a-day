---
extends: _layouts.post
section: content
title: Check if it is a straight line
problemUrl: https://leetcode.com/problems/check-if-it-is-a-straight-line/
date: 2023-06-04
categories: [math-and-geometry]
---

We will check if the slope of the line joining the first two points is equal to the slope of the line joining the second and third points. If it is, then we will check the same for the next two points and so on.

```python
class Solution:
    def checkStraightLine(self, coordinates: List[List[int]]) -> bool:
        x1, y1 = coordinates[0]
        x2, y2 = coordinates[1]
        for i in range(2, len(coordinates)):
            x3, y3 = coordinates[i]
            if (y2 - y1) * (x3 - x2) != (y3 - y2) * (x2 - x1):
                return False
        return True
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
