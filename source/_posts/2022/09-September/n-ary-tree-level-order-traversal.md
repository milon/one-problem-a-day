---
extends: _layouts.post
section: content
title: N-ary tree level order traversal
problemUrl: https://leetcode.com/problems/n-ary-tree-level-order-traversal/
date: 2022-09-01
categories: [tree]
---

We will run BFS in each level and append the values in a result list, and return the list when traversal is done.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, children=None):
        self.val = val
        self.children = children
"""

class Solution:
    def levelOrder(self, root: 'Node') -> List[List[int]]:
        if not root:
            return []
        
        q = collections.deque([root])
        res = []
        while q:
            qLen = len(q)
            level = []
            for _ in range(qLen):
                node = q.pop()
                level.append(node.val)
                for child in node.children:
                    q.appendleft(child)
            res.append(level)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`