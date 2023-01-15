---
extends: _layouts.post
section: content
title: Number of good paths
problemUrl: https://leetcode.com/problems/number-of-good-paths/
date: 2023-01-15
categories: [tree]
---

We will try to build the graph from nodes with the smallest value to the largest value. If we build the graph in this way, nodes in the graph will always be smaller than or equal to the value we are checking, then we just need to calculate nCr for each connected graph, explained more blow.

- Sort the value, and start to union the nodes with the current v that we are checking and their neighbors (have smaller values than the current v).
- In this way, our unioned elements (nodes in the current graph) will only have values smaller than or equal to the current v.
- For each group we unioned, we need to count the number of elements with value==v in this group.
- If there are n number of nodes that have value==v in the a group. The number of paths is the number of combinations for selecting 2 elements from n elements (repetitions are not allowed). <br/>
E.g., if we have a group of nodes with values like this [1,1,2,1,1,2,1,1,2], and we are currently checking for value 2, no matter how the graph of this group oriented, there will be comb(3,2) paths starting from 2 and ending with 2 with all other nodes on the paths smaller or equal to 2.

```python
class Solution:
    def numberOfGoodPaths(self, vals: List[int], edges: List[List[int]]) -> int:
        UF = {}
        
        def find(x):
            UF.setdefault(x,x)
            if x != UF[x]:
                UF[x] = find(UF[x])
            return UF[x]
        
        def union(x,y):
            UF[find(x)] = find(y)
            
        tree = collections.defaultdict(list)
        val2Nodes = collections.defaultdict(set)
        for s, e in edges:
            tree[s].append(e)
            tree[e].append(s)
            val2Nodes[vals[s]].add(s)
            val2Nodes[vals[e]].add(e)
        
        res = len(vals)
        for v in sorted(val2Nodes.keys()):
            for node in val2Nodes[v]:
                for nei in tree[node]:
                    if vals[nei] <= v:
                        union(node, nei)
            
            groupCount = defaultdict(int)
            for node in val2Nodes[v]:
                groupCount[find(node)] += 1
                
            for root in groupCount.keys():
                res += math.comb(groupCount[root], 2)
        
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`