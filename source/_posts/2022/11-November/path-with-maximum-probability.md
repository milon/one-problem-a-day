---
extends: _layouts.post
section: content
title: Path with maximum probability
problemUrl: https://leetcode.com/problems/path-with-maximum-probability/
date: 2022-11-20
categories: [graph]
---

We can use Dijkstra's algorithm to find the shortest path from the start node to the end node. We will keep track of the probability of the shortest path from the start node to the current node. Then we will iterate over each node until the end node, and we will check if the probability of the shortest path from the start node to the current node is greater than the probability of the shortest path from the start node to the previous node plus the probability of the edge from the previous node to the current node. If yes, we will update the probability of the shortest path from the start node to the current node. We will continue this process until we reach the end node.

```python
class Solution:
    def maxProbability(self, n: int, edges: List[List[int]], succProb: List[float], start: int, end: int) -> float:
        graph = collections.defaultdict(list)
        for (u, v), w in zip(edges, succProb):
            graph[u].append((v, w))
            graph[v].append((u, w))
        
        visited = set()
        heap = [(-1, start)]
        while heap:
            prob, node = heapq.heappop(heap)
            if node == end:
                return -prob
            visited.add(node)
            for next_node, add_prob in graph[node]:
                if next_node in visited:
                    continue
                next_prob = prob * add_prob
                heapq.heappush(heap, (next_prob, next_node))
        return 0
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`