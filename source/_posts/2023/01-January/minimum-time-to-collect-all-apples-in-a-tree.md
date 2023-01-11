---
extends: _layouts.post
section: content
title: Minimum time to collect all apples in a tree
problemUrl: https://leetcode.com/problems/minimum-time-to-collect-all-apples-in-a-tree/
date: 2023-01-11
categories: [tree, graph]
---

We will create a graph form the edges. Then we will start from node 0, and run DFS to visit all the apples and count the number of edges on the way. Finally we will return the maximum number of edges.

```python
class Solution:
    def minTime(self, n: int, edges: List[List[int]], hasApple: List[bool]) -> int:
        tree = collections.defaultdict(list)
        for start, end in edges:
            tree[start].append(end)
            tree[end].append(start)
        
        def dfs(node, parent):
            res = 0
            for nei in tree[node]:
                if nei != parent:
                    res += dfs(nei, node)
            
            if res or hasApple[node]:
                return res+2

            return res

        return max(dfs(0,-1)-2, 0)

```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`