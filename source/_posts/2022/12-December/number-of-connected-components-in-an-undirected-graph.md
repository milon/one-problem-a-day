---
extends: _layouts.post
section: content
title: Number of connected components in an undirected graph
problemUrl: https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/
date: 2022-12-03
categories: [graph]
---

First we will create an adjacency list of the graph from the edges. Then we will use a depth-first search to solve this problem. We will keep track of the number of connected components. We will iterate over the nodes of the graph. If a node is not visited, we will increment the number of connected components and perform a depth-first search on the node.

```python
class Solution:
    def countComponents(self, n: int, edges: List[List[int]]) -> int:
        graph = collections.defaultdict(list)
        for u, v in edges:
            graph[u].append(v)
            graph[v].append(u)
        visited = set()
        res = 0
        for node in range(n):
            if node not in visited:
                res += 1
                self.dfs(node, graph, visited)
        return res
    
    def dfs(self, node, graph, visited):
        visited.add(node)
        for nei in graph[node]:
            if nei not in visited:
                self.dfs(nei, graph, visited)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`