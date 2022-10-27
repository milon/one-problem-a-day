---
extends: _layouts.post
section: content
title: Image overlap
problemUrl: https://leetcode.com/problems/image-overlap/
date: 2022-10-27
categories: [array-and-hashmap]
---

We will convert the two images into a list of coordinates. Then we will iterate over all possible shifts and count the number of overlapping coordinates. The maximum number of overlapping coordinates will be the answer.

```python
class Solution:
    def largestOverlap(self, img1: List[List[int]], img2: List[List[int]]) -> int:
        img1 = [(i, j) for i, row in enumerate(img1) for j, item in enumerate(row) if item]
        img2 = [(i, j) for i, row in enumerate(img2) for j, item in enumerate(row) if item]
        count = collections.Counter((x1-x2, y1-y2) for x1, y1 in img1 for x2, y2 in img2)
        return max(count.values() or [0])
```

Time complexity: O(n^2) <br/>
Space complexity: O(n^2)