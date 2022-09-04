---
extends: _layouts.post
section: content
title: Amount of time for binary tree to be infected
problemUrl: https://leetcode.com/problems/amount-of-time-for-binary-tree-to-be-infected/
date: 2022-09-04
categories: [tree]
---

We will first create an adjacency list for our tree. Then we run a simple BFS to traverse all the nodes, and the number of level we need to traverse is our time.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def amountOfTime(self, root: Optional[TreeNode], start: int) -> int:
        graph = collections.defaultdict(list)
        self.createGraph(root, graph)
        
        time = -1
        q = collections.deque([start])
        visited = set()
        while q:
            qLen = len(q)
            for _ in range(qLen):
                node = q.pop()
                visited.add(node)
                for neighbor in graph[node]:
                    if neighbor not in visited:
                        q.appendleft(neighbor)
            time += 1
        return time
        
    def createGraph(self, root, graph):
        if not root:
            return
        if root.left:
            graph[root.val].append(root.left.val)
            graph[root.left.val].append(root.val)
            self.createGraph(root.left, graph)
        if root.right:
            graph[root.val].append(root.right.val)
            graph[root.right.val].append(root.val)
            self.createGraph(root.right, graph)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`