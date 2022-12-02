---
extends: _layouts.post
section: content
title: Minimum cost to reach city with discounts
problemUrl: https://leetcode.com/problems/minimum-cost-to-reach-city-with-discounts/
date: 2022-12-02
categories: [graph]
---

We will use Dijkstra's algorithm to solve this problem. We will create a graph with the cities as the nodes and the edges as the roads. We will then use Dijkstra's algorithm to find the shortest path from the source city to the destination city. We will return the cost of the shortest path.

```python
class Solution:
    def minimumCost(self, n: int, highways: List[List[int]], discounts: int) -> int:
        graph = collections.defaultdict(list)
        for s, d, w in highways:
            graph[s].append((d, w))
            graph[d].append((s, w))
        
        visited = {}
        heap = [(0, 0, discounts)]
        while heap:
            cur_cost, cur, cur_discount = heapq.heappop(heap)
            
            if cur in visited and visited[cur] >= cur_discount:
                continue
            
            if cur == n-1:
                return cur_cost
            
            visited[cur] = cur_discount
            for neighbor, cost in graph[cur]:
                if neighbor in visited:
                    continue
                
                if cur_discount > 0:    # apply discount
                    heapq.heappush(heap, (cur_cost+cost//2, neighbor, cur_discount-1))
                
                heapq.heappush(heap, (cur_cost + cost, neighbor, cur_discount))
                
        return -1  
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`