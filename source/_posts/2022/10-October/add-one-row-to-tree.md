---
extends: _layouts.post
section: content
title: Add one row to tree
problemUrl: https://leetcode.com/problems/add-one-row-to-tree/
date: 2022-10-05
categories: [tree]
---

We will recursively traverse the tree, and when we reach the level of the given depth, we insert nodes on both left and right subtree and return the value.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def addOneRow(self, root: Optional[TreeNode], val: int, depth: int) -> Optional[TreeNode]:
        if depth == 1:
            return TreeNode(val, left=root)
        
        def dfs(root, dep):
            if not root:
                return dep
            
            if dep == depth-2:
                root.left = TreeNode(val, left=root.left)
                root.right = TreeNode(val, right=root.right)
            
            return max(dfs(root.left, dep+1), dfs(root.right, dep+1))
        
        dfs(root, 0)
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`