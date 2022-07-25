---
extends: _layouts.post
section: content
title: Number of connected components in an undirected graph
problemUrl: https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/
date: 2022-07-25
categories: [graph]
---

First we will create an adjacency list from the edges. Then we will run DFS from the very first node, and added it to out visited set, also count it as a connected component. In the process of DFS traversal, it will add all the connected components to out visited set. As we iterate over all the nodes, if we found any undivsovered node, we will run DFS again from there and increase our count. Finally, we will return the count when every node is already been visited.

```python
from typing import List

class Solution:
    def countComponents(self, n: int, edges: List[List[int]]) -> int:
        graph = {}
        for i in range(n):
            graph[i] = []
        for n1, n2 in edges:
            graph[n1].append(n2)
            graph[n2].append(n1)
        
        visited = set()
        count = 0

        def dfs(node) -> bool:
            if node in visited:
                return False
            visited.add(node)
            for n in graph[node]:
                dfs(n)
            return True
        
        for node in range(n):
            if node not in visited:
                count += 1
                dfs(node)
        
        return count
```

Time Complexity: `O(n*e)`, n is the number of nodes, and e is the number of edges. <br/>
Space Complexity: `O(n*e)`