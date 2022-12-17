---
extends: _layouts.post
section: content
title: Number of boomerangs
problemUrl: https://leetcode.com/problems/number-of-boomerangs/
date: 2022-12-17
categories: [array-and-hashmap]
---

We will use a hashmap to store the distance between each point and the current point. Then we will iterate through the hashmap to calculate the number of boomerangs.

```python
class Solution:
    def numberOfBoomerangs(self, points: List[List[int]]) -> int:
        def distance(p1, p2):
            return (p1[0] - p2[0]) ** 2 + (p1[1] - p2[1]) ** 2

        res = 0
        for p1 in points:
            hashmap = {}
            for p2 in points:
                d = distance(p1, p2)
                hashmap[d] = hashmap.get(d, 0) + 1
            for d in hashmap:
                res += hashmap[d] * (hashmap[d] - 1)
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`
