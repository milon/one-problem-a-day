---
extends: _layouts.post
section: content
title: Widest vertical area between two points containing no points
problemUrl: https://leetcode.com/problems/widest-vertical-area-between-two-points-containing-no-points/
date: 2022-11-20
categories: [array-and-hashmap]
---

We sort the points by x-coordinate, and find the maximum distance between two consecutive points.

```python
class Solution:
    def maxWidthOfVerticalArea(self, points: List[List[int]]) -> int:
        arr = sorted(x for x, y in points)
        return max(arr[i] - arr[i - 1] for i in range(1, len(arr)))
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`