---
extends: _layouts.post
section: content
title: Number of nodes in the sub tree with the same label
problemUrl: https://leetcode.com/problems/number-of-nodes-in-the-sub-tree-with-the-same-label/
date: 2023-01-12
categories: [tree]
---

We will create a tree from the edges list. Then we will start DFS from starting node `0`. Then we will calculate all the nodes in the subtree of each node. Finally we will return the number of nodes in the subtree of each node.

```python
class Solution:
    def countSubTrees(self, n: int, edges: List[List[int]], labels: str) -> List[int]:
        tree = collections.defaultdict(list)
        for s,e in edges:
            tree[s].append(e)
            tree[e].append(s)
        
        res = [0] * n
        
        def dfs(node = 0, par = -1):
            count = collections.Counter()
            for nei in tree[node]:
                if nei != par:
                    count += dfs(nei, node)
            
            count[labels[node]] += 1
            res[node] = count[labels[node]]
            
            return count
        
        dfs()
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`