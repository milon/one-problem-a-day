---
extends: _layouts.post
section: content
title: Number of restricted paths from first to last node
problemUrl: https://leetcode.com/problems/number-of-restricted-paths-from-first-to-last-node/
date: 2022-09-11
categories: [graph]
---

We will first create an adjacency list from the edge list. Then we run dijkstra's shortest path algorithm to get the shortest distance from first node every other node. Then we run DFS from first node to the last node, and each time we find a shortest path form the src to neighbor, we add that to our result and finally mod it by 10^9+7. As we are running DFS, we will encounter many duplicate path, we will memoize it to make the traverse faster.

```python
class Solution:
    def countRestrictedPaths(self, n: int, edges: List[List[int]]) -> int:
        if n == 1:
            return 0
        
        MOD = 10 ** 9 + 7
        graph = self.buildGraph(edges)

        def dijkstra():
            heap = [(0, n)]
            distance = [math.inf] * (n+1)
            distance[n] = 0
            while heap:
                dist, node = heapq.heappop(heap)
                if dist != distance[node]:
                    continue
                for weight, neighbor in graph[node]:
                    if distance[neighbor] > distance[node] + weight:
                        distance[neighbor] = distance[node] + weight
                        heapq.heappush(heap, (distance[neighbor], neighbor))
            return distance
        
        def dfs(src, memo):
            if src in memo:
                return memo[src]
            
            if src == n:
                return 1
            res = 0
            for _, neighbor in graph[src]:
                if distance[src] > distance[neighbor]:
                    res = (res + dfs(neighbor, memo)) % MOD
            memo[src] = res
            return memo[src]
        
        distance = dijkstra()
        return dfs(1, {})
            
    def buildGraph(self, edges):
        graph = collections.defaultdict(list)
        for s, d, w in edges:
            graph[s].append((w, d))
            graph[d].append((w, s))
        return graph
```

Time Complexity: `O(elog(v))`, e is the number of edges, v is the number if nodes <br/>
Space Complexity: `O(e+v)`