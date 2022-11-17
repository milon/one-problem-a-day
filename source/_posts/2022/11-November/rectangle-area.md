---
extends: _layouts.post
section: content
title: Rectangle area
problemUrl: https://leetcode.com/problems/rectangle-area/
date: 2022-11-17
categories: [math-and-geometry]
---

We will find the area of the first rectangle and the second rectangle. We will find the area of the overlapping rectangle by finding the length and breadth of the overlapping rectangle. We will subtract the area of the overlapping rectangle from the area of the first rectangle and the area of the second rectangle and add the area of the overlapping rectangle to get the total area.

```python
class Solution:
    def computeArea(self, ax1: int, ay1: int, ax2: int, ay2: int, bx1: int, by1: int, bx2: int, by2: int) -> int:
        area1 = (ax2-ax1)*(ay2-ay1)
        area2 = (bx2-bx1)*(by2-by1)
        length = min(ax2, bx2) - max(ax1, bx1)
        breadth = min(ay2, by2) - max(ay1, by1)

        if length > 0 and breadth > 0:
            area3 = length*breadth
        else:
            area3 = 0
        return area1+area2-area3
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`

We can also achieve the same thing in one line code-

```python
class Solution:
    def computeArea(self, ax1: int, ay1: int, ax2: int, ay2: int, bx1: int, by1: int, bx2: int, by2: int) -> int:
        return (ax2-ax1)*(ay2-ay1) + (bx2-bx1)*(by2-by1) - max(0, min(ax2, bx2) - max(ax1, bx1)) * max(0, min(ay2, by2) - max(ay1, by1))
```
