---
extends: _layouts.post
section: content
title: Find closest node to given two nodes
problemUrl: https://leetcode.com/problems/find-closest-node-to-given-two-nodes/
date: 2023-01-25
categories: [graph]
---

We will calculate distances between node1 and other reachable nodes. Then we will do the same thing for node2 too. Then we will iterate the nodes that are on the path for both distances and find max. Then find min of maxes and keep track of minimum index.

If there was a constraint that node1 and node2 have a guarenteed path between them, the problem could have been simpler, to construct find the shortestPath between node1 -> node 2 and the res is one of the nodes in between.

```python
class Solution:
    def closestMeetingNode(self, edges: List[int], node1: int, node2: int) -> int:
        dist1 = [math.inf for _ in range(len(edges))]
        dist2 = [math.inf for _ in range(len(edges))]
        
        def dfs(node, di, d):
            if d[node] > di: 
                d[node] = di
                if edges[node] != -1:
                    dfs(edges[node], di+1, d)
        
        dfs(node1, 0, dist1)
        dfs(node2, 0, dist2)
        
        for i in range(len(edges)):
            dist1[i] = max(dist1[i], dist2[i])
        
        res = dist1.index(min(dist1))
        return res if dist1[res] != math.inf else -1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`