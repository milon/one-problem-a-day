---
extends: _layouts.post
section: content
title: K closest points to origin
problemUrl: https://leetcode.com/problems/k-closest-points-to-origin/
date: 2022-07-23
categories: [heap]
---

First we will calculate all the distances from the origin and put that on a list. Then we heapify that list, then pop top k elements and put their coordinate on a result array and return that.

```python
class Solution:
    def kClosest(self, points: List[List[int]], k: int) -> List[List[int]]:
        pts = []
        for x, y in points:
            dist = (abs(x-0)**2) + (abs(y-0)**2)
            pts.append((dist, x, y))

        heapq.heapify(pts)
        res = []
        for _ in range(k):
            dist, x, y = heapq.heappop(pts)
            res.append([x, y])

        return res
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`

