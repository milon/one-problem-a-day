---
extends: _layouts.post
section: content
title: Is graph bipartite
problemUrl: https://leetcode.com/problems/is-graph-bipartite/
date: 2022-09-13
categories: [graph]
---

If we run BFS, then every level of traversal will have a different color. So we start from node 0, then start traversal using BFS and on each level, we alternate the color. In the process if we find 2 adjacent node has same color, that means the graph is not bipartite, we return false, otherwise we will return true.

```python
class Solution:
    def isBipartite(self, graph: List[List[int]]) -> bool:
        n , color = len(graph), {}
        for i in range(n):
            if i not in color:
                color[i] = 1
                q = collections.deque([i])
                while q:
                    node = q.pop()
                    for neighbor in graph[node]:
                        if neighbor not in color:
                            color[neighbor] = -color[node]
                            q.appendleft(neighbor)
                        elif color[neighbor] == color[node]:
                            return False
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`