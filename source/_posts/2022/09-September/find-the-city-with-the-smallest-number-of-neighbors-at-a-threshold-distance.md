---
extends: _layouts.post
section: content
title: Find the city with the smallest number of neighbors at a threshold distance
problemUrl: https://leetcode.com/problems/find-the-city-with-the-smallest-number-of-neighbors-at-a-threshold-distance/
date: 2022-09-11
categories: [graph]
---

We will first create an adjacency list from the edge list. Then we run dijkstra's shortest path algorithm to get the number of neighbors of a city. We will run this dijkstra's algorithm for each node and store it to a distances list. We will get the largest number from this distance array and retrun the city from this.

```python
class Solution:
    def findTheCity(self, n: int, edges: List[List[int]], distanceThreshold: int) -> int:
        graph = self.createGraph(edges)
        
        def getNumberOfNeighborCity(city):
            heap = [(0, city)]
            distance = {}
            
            while heap:
                weight, node = heapq.heappop(heap)
                if node in distance:
                    continue
                if node != city:
                    distance[node] = weight
                for wei, neighbor in graph[node]:
                    if neighbor in distance:
                        continue
                    if wei + weight <= distanceThreshold:
                        heapq.heappush(heap, (wei+weight, neighbor))
            return len(distance)
    
        distances = []
        for city in range(n):
            distances.append((getNumberOfNeighborCity(city), city))

        distance = max(distances, key=lambda x: (-x[0], x[1]))
        return distance[1]
        
    def createGraph(self, edges):
        graph = collections.defaultdict(list)
        for src, dest, weight in edges:
            graph[src].append((weight, dest))
            graph[dest].append((weight, src))
        return graph
```

Time Complexity: `O(n^3)`, n is the number of nodes <br/>
Space Complexity: `O(n^2)`