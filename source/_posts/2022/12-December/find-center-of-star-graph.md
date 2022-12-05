---
extends: _layouts.post
section: content
title: Find center of star graph
problemUrl: https://leetcode.com/problems/find-center-of-star-graph/
date: 2022-12-05
categories: [graph]
---

As it's a start graph, each edge will be connected to the center. So we can just check the first 2 edges and return the node that is connected to both of them.

```python
class Solution:
    def findCenter(self, edges: List[List[int]]) -> int:
        if edges[0][0]==edges[1][0] or edges[0][0]==edges[1][1]:
            return edges[0][0]
        return edges[0][1]
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`