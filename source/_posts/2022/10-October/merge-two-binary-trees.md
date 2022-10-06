---
extends: _layouts.post
section: content
title: Merge two binary trees
problemUrl: https://leetcode.com/problems/merge-two-binary-trees/
date: 2022-10-06
categories: [tree]
---

We will start form the root and run a DFS with both the tree and merge their value to the new tree and return that new tree as result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def mergeTrees(self, root1: Optional[TreeNode], root2: Optional[TreeNode]) -> Optional[TreeNode]:
        if root1 and root2:
            root = TreeNode(root1.val + root2.val)
            root.left = self.mergeTrees(root1.left, root2.left)
            root.right = self.mergeTrees(root1.right, root2.right)
            return root
        else:
            return root1 or root2
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`