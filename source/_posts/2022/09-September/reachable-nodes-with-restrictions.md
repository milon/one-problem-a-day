---
extends: _layouts.post
section: content
title: Reachable nodes with restrictions
problemUrl: https://leetcode.com/problems/reachable-nodes-with-restrictions/
date: 2022-09-02
categories: [graph]
---

We will create an adjacency list from the edges list. Then we convert our restricted list to a set for constant lookup. Then we perform a BFS to visit all the nodes, if the node is already been visited or in the restricted set, we return from that node. When our traversal from node 0 is done, we count our visited set and return.

```python
class Solution:
    def reachableNodes(self, n: int, edges: List[List[int]], restricted: List[int]) -> int:
        graph = self.createGraph(edges)
        
        restricted = set(restricted)
        visited = set()
        q = collections.deque([0])
        
        while q:
            node = q.pop()
            visited.add(node)
            for neighbor in graph[node]:
                if neighbor not in restricted and neighbor not in visited:
                    q.appendleft(neighbor)
        
        return len(visited)
        
    def createGraph(self, edges):
        graph = collections.defaultdict(list)
        for n1, n2 in edges:
            graph[n1].append(n2)
            graph[n2].append(n1)
        return graph
```

Time Complexity: `O(ev)`, e is the number of edges and v is the number of nodes <br/>
Space Complexity: `O(v)`, v is the number of nodes