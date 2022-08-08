---
extends: _layouts.post
section: content
title: Clone graph
problemUrl: https://leetcode.com/problems/clone-graph/
date: 2022-08-08
categories: [graph]
---

First we will create a copy of the graph and put it on our hashmap. Then we run DFS for each neighbors to do the same thing, once the whole traverse it done, we will return the copy.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val = 0, neighbors = None):
        self.val = val
        self.neighbors = neighbors if neighbors is not None else []
"""

class Solution:
    def cloneGraph(self, node: 'Node') -> 'Node':
        oldToNew = {}
        
        def dfs(node):
            if node in oldToNew:
                return oldToNew[node]
            copy = Node(node.val)
            oldToNew[node] = copy
            for neighbor in node.neighbors:
                copy.neighbors.append(dfs(neighbor))
            return copy
        
        return dfs(node) if node else None
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`