---
extends: _layouts.post
section: content
title: All nodes distance k in binary tree
problemUrl: https://leetcode.com/problems/all-nodes-distance-k-in-binary-tree/
date: 2022-11-20
categories: [tree]
---

First we will traverse the tree using DFS and create an adjacency list for each node. Then we will use BFS to find all nodes that are `k` distance away from the target node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def distanceK(self, root: TreeNode, target: TreeNode, k: int) -> List[int]:
        graph = collections.defaultdict(list)
        def createGraph(parent, child):
            if parent and child:
                graph[parent.val].append(child.val)
                graph[child.val].append(parent.val)
                
            if child.left: 
                createGraph(child, child.left)
            if child.right: 
                createGraph(child, child.right)
        createGraph(None, root)
        
        visited = set([target.val])
        q = collections.deque([target.val])
        for _ in range(k):
            qLen = len(q)
            for i in range(qLen):
                node = q.pop()
                for nei in graph[node]:
                    if nei not in visited:
                        visited.add(nei)
                        q.appendleft(nei)
        
        return list(q)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`