---
extends: _layouts.post
section: content
title: Satisfiability of equality equations
problemUrl: https://leetcode.com/problems/satisfiability-of-equality-equations/
date: 2022-09-26
categories: [graph]
---

We make an undirected graph in which the nodes are integers (as lower-case letters) and each edge connects integers that are equal. We use the union-find algorithm to determine the connected graphs. We keep track of the pairs (a,b) such that a =! b. If the any such pair are in the same connected graph, then return false, otherwise return true.

```python
class Solution:
    def equationsPossible(self, equations: List[str]) -> bool:
        parent, diff = {}, []
        
        def find(x):
            if x not in parent:
                return x
            return find(parent[x])
        
        for s in equations:
            a, b = s[0], s[3]
            if s[1] == '=':
                x, y = find(a), find(b)
                if x != y:
                    parent[y] = x
            else:
                diff.append((a, b))
                
        return all(find(a) != find(b) for a, b in diff)
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`
