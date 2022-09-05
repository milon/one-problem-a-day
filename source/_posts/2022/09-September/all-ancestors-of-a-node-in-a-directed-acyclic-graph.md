---
extends: _layouts.post
section: content
title: All ancestors of a node in a directed acyclic graph
problemUrl: https://leetcode.com/problems/all-ancestors-of-a-node-in-a-directed-acyclic-graph/
date: 2022-09-05
categories: [graph]
---

First we will create an ancestors adgacency list, where we can get the immediate parent of each node from the edge list. Then we will run DFS from each node, and get the node list of all reachable nodes as a list and append that to our result. Finally we will return this result.

```python
class Solution:
    def getAncestors(self, n: int, edges: List[List[int]]) -> List[List[int]]:
        graph = self.buildAncestorsGraph(n, edges)
        
        def dfs(node):
            visited.add(node)
            for neighbor in graph[node]:
                if neighbor not in visited:
                    dfs(neighbor)
        
        res = []
        for i in range(n):
            visited = set()
            dfs(i)
            visited.remove(i)
            res.append(sorted(list(visited)))
        return res
        
    def buildAncestorsGraph(self, n: int, edges: List[List[int]]) -> dict:
        graph = {}
        for i in range(n):
            graph[i] = []
        for n1, n2 in edges:
            graph[n2].append(n1)
        return graph
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`