---
extends: _layouts.post
section: content
title: Binary tree level order traversal II
problemUrl: https://leetcode.com/problems/binary-tree-level-order-traversal-ii/
date: 2022-09-04
categories: [tree]
---

This is a classing BFS problem. We should traverse the whole tree with BFS, and store the values level by level to a list. Then combine each level to a list and return the reversed list as result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def levelOrderBottom(self, root: Optional[TreeNode]) -> List[List[int]]:
        if not root:
            return []
        
        res = []
        q = collections.deque([root])
        while q:
            qLen = len(q)
            level = []
            for _ in range(qLen):
                node = q.pop()
                level.append(node.val)
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
            res.append(level)
        
        return reversed(res)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`