---
extends: _layouts.post
section: content
title: All paths from source to target
problemUrl: https://leetcode.com/problems/all-paths-from-source-to-target/
date: 2022-08-29
categories: [backtracking]
---

We will always start from 0, so we add 0 in that path. Then we run DFS from 0, and when we find the last node, which is the length of the graph-1 node, we add this current path to our final paths list. Finally, when the iteration is done, we return our paths result.

```python
class Solution:
    def allPathsSourceTarget(self, graph: List[List[int]]) -> List[List[int]]:
        paths = []
        path = [0]
        
        def dfs(i):
            if i == len(graph)-1:
                paths.append(path.copy())
                return
            
            for neighbor in graph[i]:
                path.append(neighbor)
                dfs(neighbor)
                path.pop()
        
        dfs(0)
        return paths
```

Time Complexity: `O(2^n)` <br/>
Space Complexity: `O(n)`