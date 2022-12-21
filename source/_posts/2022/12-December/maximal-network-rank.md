---
extends: _layouts.post
section: content
title: Maximal network rank
problemUrl: https://leetcode.com/problems/maximal-network-rank/
date: 2022-12-21
categories: [graph]
---

We will create an adjacency list to represent the graph. We will iterate through all pairs of cities and find the number of common neighbors. If the number of common neighbors is greater than the current maximum, we will update the maximum. We will return the maximum.

```python
class Solution:
    def maximalNetworkRank(self, n: int, roads: List[List[int]]) -> int:
        graph = collections.defaultdict(list)
        for u, v in roads:
            graph[u].append(v)
            graph[v].append(u)

        res = 0
        for i in range(n):
            for j in range(i+1, n):
                res = max(res, len(graph[i]) + len(graph[j]) - (i in graph[j]))
        return res
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`