---
extends: _layouts.post
section: content
title: Minimum score of a path between two cities
problemUrl: https://leetcode.com/problems/minimum-score-of-a-path-between-two-cities/
date: 2022-12-05
categories: [graph]
---

We will create an adjacency list for the graph. Then we traverse the graph with BFS and keep track of the minimum score for each node. We will return the minimum score for the destination node.

```python
class Solution:
    def minScore(self, n: int, roads: List[List[int]]) -> int:
        graph = collections.defaultdict(list)
        for node1, node2, cost in roads:
            graph[node1].append((node2, cost))
            graph[node2].append((node1, cost))
        
        res = math.inf
        queue = collections.deque([1])
        visited = set([1])
        while queue:
            node = queue.popleft()
            for next_node, c in graph[node]:
                res = min(res, c)
                if next_node not in visited:
                    visited.add(next_node)
                    queue.append(next_node)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`