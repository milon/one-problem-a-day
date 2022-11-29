---
extends: _layouts.post
section: content
title: Inorder successor in BST
problemUrl: https://leetcode.com/problems/inorder-successor-in-bst/
date: 2022-11-29
categories: [tree]
---

As we are traversing a binary search tree, we can use it's property to find the inorder successor. The inorder successor of a node is the leftmost node in the right subtree. If the node does not have a right subtree, then the inorder successor is the lowest ancestor of the node whose left child is also an ancestor of the node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def inorderSuccessor(self, root: TreeNode, p: TreeNode) -> Optional[TreeNode]:
        successor = None
        while root:
            if p.val >= root.val:
                root = root.right
            else:
                successor = root
                root = root.left
        return successor
```

Time complexity: `O(h)`, h is the height of the tree <br/>
Space complexity: `O(1)`