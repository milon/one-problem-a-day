---
extends: _layouts.post
section: content
title: Redundant connection
problemUrl: https://leetcode.com/problems/redundant-connection/
date: 2022-08-12
categories: [graph]
---

We can use union find algorithm detect the cycle, and the edge that makes the cycle, that is our redundant edge. For union find, we will union the nodes by their rank. Initially all the rank will be 1 and each node will have the parent of themselves, that means no parent. For find, we will check who is the parent of the node, and until we find the node, that has no parent, we will return that as parent. For union, we will get the parents of both node, then the node, who has bigger rank, we will use that as the new parent, and update the rank of it by adding the rank of the child parent claster. Finally, we will go through each edge, and whenever we find the redundant edge, we will return that.

```python
class Solution:
    def findRedundantConnection(self, edges: List[List[int]]) -> List[int]:
        parent = [i for i in range(len(edges)+1)]
        rank = [1] * (len(edges)+1)
        
        def find(n):
            p = parent[n]
            while p != parent[p]:
                parent[p] = parent[parent[p]]   # path compression
                p = parent[p]
            return p
        
        def union(n1, n2):
            p1, p2 = find(n1), find(n2)
            
            if p1 == p2:
                return False
            if rank[p1] > rank[2]:
                parent[p2] = p1
                rank[p1] += rank[p2]
            else:
                parent[p1] = p2
                rank[p2] += rank[p1]
            return True
        
        for n1, n2 in edges:
            if not union(n1, n2):
                return [n1, n2]
```

Time Complexity: `O(n*log(n))` <br/>
Space Complexity: `O(n)`