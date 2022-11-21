---
extends: _layouts.post
section: content
title: Number of operations to make network connected
problemUrl: https://leetcode.com/problems/number-of-operations-to-make-network-connected/
date: 2022-11-21
categories: [graph]
---

We will create an adjacency list of the graph and then we will traverse the graph using DFS and count the number of connected components. If the number of connected components is greater than 1, then we will return the number of connected components minus 1. Otherwise, we will return -1.

```python
class Solution:
    def makeConnected(self, n: int, connections: List[List[int]]) -> int:
        if len(connections) < n-1:
            return -1
        
        graph = [set() for _ in range(n)]
        for i, j in connections:
            graph[i].add(j)
            graph[j].add(i)
            
        seen = set()
        
        def dfs(i):
            if i in seen:
                return 0
            seen.add(i)
            for j in graph[i]:
                dfs(j)
            return 1
        
        connected = 0
        for i in range(n):
            connected += dfs(i)
        
        return connected - 1
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`