---
extends: _layouts.post
section: content
title: Describe the painting
problemUrl: https://leetcode.com/problems/describe-the-painting/
date: 2022-12-06
categories: [array-and-hashmap]
---

We will loop over the segments and add the start and end points to a list. Then we will sort the list and loop over it. We will keep track of the current color and the current start point. When we reach a new color, we will add the current color and the current start point to the result. Then we will update the current color and the current start point.

```python
class Solution:
    def splitPainting(self, segments: List[List[int]]) -> List[List[int]]:
        mapping = collections.defaultdict(int)
        for start, end, cost in segments:
            mapping[start] += cost
            mapping[end] -= cost

        res = []
        prev, color = None, 0
        for now in sorted(mapping):
            if color:
                res.append((prev, now, color))
            color += mapping[now]
            prev = now
        
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`
