---
extends: _layouts.post
section: content
title: Graph valid tree
problemUrl: https://leetcode.com/problems/graph-valid-tree/
date: 2022-07-21
categories: [graph]
---

First we create a adjacency list from the edge list. Then we traverse the whole graph starting from node 0. If we don't have any cycle or any disjoint node, then it's a valid tree, otherwise we return False.

```python
class Solution:
    def valid_tree(self, n: int, edges: List[List[int]]) -> bool:
        if not n:
            return True
        graph = {i: [] for i in range(n)}
        for n1, n2 in edges:
            graph[n1].append(n2)
            graph[n2].append(n1)

        visited = set()

        def dfs(node, prev):
            if node in visited:
                return False
            visited.add(node)
            for neighbor in graph[node]:
                if neighbor == prev:
                    continue
                if not dfs(neighbor, node):
                    return False
            return True

        return dfs(0, -1) and len(visited) == n
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`