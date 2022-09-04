---
extends: _layouts.post
section: content
title: Evaluate division
problemUrl: https://leetcode.com/problems/evaluate-division/
date: 2022-09-04
categories: [graph]
---

We will first create an adjacency list from the provided equations and values list. Each node will have the related node and thier weight in it. Then we run DFS to find the result. Finally, we will run every query through our dfs and append the output to our result and return it.

```python
class Solution:
    def calcEquation(self, equations: List[List[str]], values: List[float], queries: List[List[str]]) -> List[float]:
        graph = self.createGraph(equations, values)
        
        res = []
        for start, end in queries:
            res.append(self.findResult(start, end, graph))
        return res
        
    def createGraph(self, equations: List[List[str]], values: List[float]) -> dict:
        graph = collections.defaultdict(set)
        
        for i in range(len(equations)):
            n1, n2 = equations[i]
            w = values[i]
            
            graph[n1].add((n2, w))
            graph[n2].add((n1, 1/w))
            graph[n1].add((n1, 1))
            graph[n2].add((n2, 1))
        
        return graph
    
    def findResult(self, start, end, graph):
        if start not in graph or end not in graph:
            return -1.0
    
        self.result, visited = -1.0, set()
        
        def dfs(node, score):
            if node == end:
                self.result = score
            
            visited.add(node)
            for neighbor, weight in graph[node]:
                if neighbor not in visited:
                    dfs(neighbor, weight*score)
            
        dfs(start, 1.0)
        return self.result
```

Time Complexity: `O(n^2*q)`, n is the number of equations, q is the number of queries <br/>
Space Complexity: `O(n^2)`