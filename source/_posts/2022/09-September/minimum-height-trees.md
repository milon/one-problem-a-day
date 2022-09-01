---
extends: _layouts.post
section: content
title: Minimum height trees
problemUrl: https://leetcode.com/problems/minimum-height-trees/
date: 2022-09-01
categories: [graph]
---

We will first create an adjacency list from the edge list. Then we start BFS from the leaf nodes, and whenever we visit a node, we add this to a list for current leaves, and decreasing the node count by 1 unlit we have only 2 nodes left. Each level of BFS, we replace the leaves with the current leaves. finally we return our leaves.

```python
class Solution:
    def findMinHeightTrees(self, n: int, edges: List[List[int]]) -> List[int]:
        if n == 1:
            return [0]
        
        graph = self.createGraph(edges)
        leaves = [n for n in graph if len(graph[n]) == 1]
        
        while n > 2:
            nextLeaves = []
            for node in leaves:
                childNode = graph[node].pop()
                n -= 1
                
                graph[childNode].remove(node)
                if len(graph[childNode]) == 1:
                    nextLeaves.append(childNode)
                
            leaves = nextLeaves
        return leaves
        
    def createGraph(self, edges: List[List[int]]):
        graph = collections.defaultdict(set)
        for n1, n2 in edges:
            graph[n1].add(n2)
            graph[n2].add(n1)
        return graph
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`