---
extends: _layouts.post
section: content
title: Minimum cost to buy apples
problemUrl: https://leetcode.com/problems/minimum-cost-to-buy-apples/
date: 2022-12-07
categories: [graph]
---

We will use Dijkstra's algorithm to find the shortest path from the source to the target. The cost of each edge is the number of apples in that node.

```python
class Solution:
    def minCost(self, n: int, roads: List[List[int]], appleCost: List[int], k: int) -> List[int]:
        graph = collections.defaultdict(list)
        for start, end, cost in roads:
            graph[start].append((cost, end))
            graph[end].append((cost, start))
        
        def dijkstra(start_city: int) -> int:
            queue = [(0, start_city)]
            visited = set()
            res = math.inf
            while queue:
                acc_cost, city = heapq.heappop(queue)
                visited.add(city)
                res = min(res, acc_cost*(k+1) + appleCost[city-1])
                for cost, next_city in graph[city]:
                    if next_city not in visited:
                        heapq.heappush(queue, (acc_cost+cost, next_city))
            return res

        return [dijkstra(city) for city in range(1, n+1)]
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`