---
extends: _layouts.post
section: content
title: Number of ways to arrive at destination
problemUrl: https://leetcode.com/problems/number-of-ways-to-arrive-at-destination/
date: 2022-11-20
categories: [graph]
---

We will use a priority queue to keep track of the minimum distance from the source to the destination. Then we will iterate over each node until the destination node, and we will check if the current node's distance is equal to the minimum distance. If yes, we will increment the result by 1. We will continue this process until we reach the end of the array.

```python
class Solution:
    def countPaths(self, n: int, roads: List[List[int]]) -> int:
        graph = defaultdict(list)
        for x, y, w in roads:
            graph[x].append((y, w))
            graph[y].append((x, w))

        dist = [math.inf] * n
        dist[0] = 0
        
        cnt = [0] * n
        cnt[0] = 1
        
        heap = [(0, 0)]
        while heap:
            min_dist, idx = heappop(heap)
            if idx == n-1: 
                return cnt[idx] % (10**9+7)
            for neib, weight in graph[idx]:
                candidate = min_dist + weight
                if candidate == dist[neib]:
                    cnt[neib] += cnt[idx]

                elif candidate < dist[neib]:
                    dist[neib] = candidate
                    heappush(heap, (weight + min_dist, neib))
                    cnt[neib] = cnt[idx]  
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`