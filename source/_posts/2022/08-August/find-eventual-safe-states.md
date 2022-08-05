---
extends: _layouts.post
section: content
title: Find eventual safe states
problemUrl: https://leetcode.com/problems/find-eventual-safe-states/
date: 2022-08-02
categories: [graph]
---

This is another topological sort problem, we are using graph coloring to solve it. At first we mark(color) everything as new. When we start our traversing with DFS, we first mark it as unsafe, then we start traversing, if we find one of it's neighbor is not already set to safe of unsafe, then we mark it as safe. We call this recursively to each node, and if a node is safe, we append it to our result.

```python
class Solution:
    def eventualSafeNodes(self, graph: List[List[int]]) -> List[int]:
        N = len(graph)
        color = [0] * N     # {0: new, 1: safe, 2: unsafe}
        res = []
        
        def dfs(start, color):
            if color[start] == 2:
                return False
            if color[start] == 1:
                return True
            
            color[start] = 2
            for node in graph[start]:
                if dfs(node, color) == False:
                    return False
            
            color[start] = 1
            return True
        
        for i in range(N):
            if dfs(i, color) == True:
                res.append(i)
        
        return res     
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`