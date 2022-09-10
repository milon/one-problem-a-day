---
extends: _layouts.post
section: content
title: Maximum binary tree II
problemUrl: https://leetcode.com/problems/maximum-binary-tree-ii/
date: 2022-09-10
categories: [tree]
---

We will run a simple DFS to find the place and insert the new node there.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def insertIntoMaxTree(self, root: Optional[TreeNode], val: int) -> Optional[TreeNode]:
        if not root:
            return TreeNode(val)
        if root.val < val:
            return TreeNode(val, left=root)
        
        def dfs(node, parent, val):
            if not node or node.val < val:
                parent.right = TreeNode(val, left=parent.right)
                return
            dfs(node.right, node, val)
        
        dfs(root.right, root, val)
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`