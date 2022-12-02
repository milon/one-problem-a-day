---
extends: _layouts.post
section: content
title: Connecting cities with minimum cost
problemUrl: https://leetcode.com/problems/connecting-cities-with-minimum-cost/
date: 2022-12-02
categories: [graph]
---

We will use Kruskal's algorithm to solve this problem. We will sort the edges in ascending order of their weights. Then we will use Union Find data structure to construct the graph. We will then iterate through the edges and add them to the graph if they do not form a cycle. We will return the sum of the weights of the edges in the graph.

```python
class UnionFind:
    def __init__(self,n):
        self.parent = [i for i in range(n+1)]
        self.n = n
    
    def find(self,p):
        if self.parent[p] != p:
            self.parent[p] = self.find(self.parent[p])
        
        return self.parent[p]
    
    def union(self,x,y):
        dx, dy = self.find(x), self.find(y)
        
        if dx != dy:
            self.parent[dx] = dy
            self.n -= 1
            return True
        
        return False
    
class Solution:
    def minimumCost(self, n: int, connections: List[List[int]]) -> int:
        connections.sort(key=lambda x: x[2])
        uf = UnionFind(n)
        
        totalCost = 0
        for src, dest, cost in connections:
            if uf.union(src, dest):
                totalCost += cost
                
        return totalCost if uf.n == 1 else -1
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`