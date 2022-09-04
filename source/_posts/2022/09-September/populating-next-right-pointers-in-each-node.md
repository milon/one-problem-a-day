---
extends: _layouts.post
section: content
title: Populating next right pointers in each node
problemUrl: https://leetcode.com/problems/populating-next-right-pointers-in-each-node/
date: 2022-09-04
categories: [tree]
---

We will traverse the tree with BFS and in each level, we will append the nodes to a list. After each level traversal, we take these nodes, and assing the next node to it's right node. We will repeat the process in each level and finally return our root.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val: int = 0, left: 'Node' = None, right: 'Node' = None, next: 'Node' = None):
        self.val = val
        self.left = left
        self.right = right
        self.next = next
"""

class Solution:
    def connect(self, root: 'Optional[Node]') -> 'Optional[Node]':
        if not root:
            return None
        
        q = collections.deque([root])
        while q:
            level = []
            qLen = len(q)
            for _ in range(qLen):
                node = q.pop()
                level.append(node)
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
            
            if qLen > 1:
                for i in range(len(level)-1):
                    level[i].next = level[i+1]

        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`