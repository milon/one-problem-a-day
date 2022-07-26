---
extends: _layouts.post
section: content
title: Network delay time
problemUrl: https://leetcode.com/problems/network-delay-time/
date: 2022-07-26
categories: [graph]
---

We will use Dijkstra's shortest path algorithm to solve this problem. First we will create an adjacency list from the edge list, where the key will be the source node and value will be a tuple contain both destination and weight. Then we create a min heap from our source node, where the weight will be 0. Then we will run a BFS to every node of the graph. In the process we will keep track of maximum time needed for the traverse of each node in a running time counter. After the BFS traversal is done, we we are able to visit every node, we will return the time otherwise -1.

```python
class Solution:
    def networkDelayTime(self, times: List[List[int]], n: int, k: int) -> int:
        graph = collections.defaultdict(list)
        for s, d, w in times:
            graph[s].append((d, w))

        minHeap = [(0, k)]
        visit = set()
        time = 0

        while minHeap:
            w1, n1 = heapq.heappop(minHeap)
            if n1 in visit:
                continue

            visit.add(n1)
            time = max(time, w1)

            for n2, w2 in graph[n1]:
                if n2 not in visit:
                    heapq.heappush(minHeap, (w1+w2, n2))

        return time if len(visit) == n else -1
```

Time Complexity, `O(E*logV)`, E is the number of edges, V is the number of vertices. <br/>
Space Complexity, `O(V+E)`