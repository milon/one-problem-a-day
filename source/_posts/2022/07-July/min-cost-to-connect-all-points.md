---
extends: _layouts.post
section: content
title: Min cost to connect all points
problemUrl: https://leetcode.com/problems/min-cost-to-connect-all-points/
date: 2022-07-28
categories: [graph]
---

We will first create an adjacency list from the given points, in the adjacency list we will also keep the manhattan distance that is mentioned in the problem. After creating the adjacency list, it's basically applying Prim's algorithm to get the minimum spanning tree. We will start from node 0, and we will connect each node that has the minimum cost. We will use a min heap to do that, and keep track of our visited set. When the number of nodes in the visited set is equal to the number of nodes, we return the result cost, that we keep track while visiting the nodes.

```python
class Solution:
    def minCostConnectPoints(self, points: List[List[int]]) -> int:
        N = len(points)
        graph = {i: [] for i in range(N)}
        for i in range(N):
            x1, y1 = points[i]
            for j in range(i+1, N):
                x2, y2 = points[j]
                dist = abs(x1-x2) + abs(y1-y2)
                graph[i].append([dist, j])
                graph[j].append([dist, i])

        # Prims' algorithm
        res = 0
        visited = set()
        minHeap = [[0, 0]]
        while len(visited) < N:
            cost, i = heapq.heappop(minHeap)
            if i in visited:
                continue
            res += cost
            visited.add(i)
            for neiCost, nei in graph[i]:
                if nei not in visited:
                    heapq.heappush(minHeap, [neiCost, nei])

        return res
```

Time Complexity: `O(n^2 * log(n))`, n is the number of vertices. <br/>
Space Complexity: `O(n)`