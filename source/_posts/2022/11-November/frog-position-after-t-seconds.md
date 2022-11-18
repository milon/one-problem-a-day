---
extends: _layouts.post
section: content
title: Frog position after t seconds
problemUrl: https://leetcode.com/problems/frog-position-after-t-seconds/
date: 2022-11-18
categories: [graph]
---

We will create a adjacency list to represent the graph. We will then use a DFS to traverse the graph. We will keep track of the number of children each node has. If the node has no children, we will add the probability of reaching that node to the total probability. If the node has children, we will divide the probability by the number of children and continue the DFS.

```python
class Solution:
    def frogPosition(self, n: int, edges: List[List[int]], t: int, target: int) -> float:
        if n == 1:
            return 1.0
        
        graph = collections.defaultdict(list)
        for s, d in edges:
            graph[s].append(d)
            graph[d].append(s)
        
        visited = set()
        
        def dfs(i, t):
            if i != 1 and len(graph[i]) == 1 or t == 0:
                return i == target
            
            visited.add(i)
            res = sum(dfs(j, t-1) for j in graph[i] if j not in visited)
            return res * 1.0 / (len(graph[i]) - (i!=1))
        
        return dfs(1, t)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`