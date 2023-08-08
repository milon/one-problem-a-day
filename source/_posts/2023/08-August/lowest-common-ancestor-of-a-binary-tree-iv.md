---
extends: _layouts.post
section: content
title: Lowest common ancestor of a binary tree IV
problemUrl: https://leetcode.com/problems/lowest-common-ancestor-of-a-binary-tree-iv/
date: 2023-08-07
categories: [tree]
---

We will use a recursive approach to solve this problem. We will traverse the tree in a post-order fashion. We will return the node if it is equal to any of the nodes in the list of nodes. We will return `None` if the node is `None`. We will return the node if the left and right subtrees return a node. We will return the left subtree if the left subtree returns a node. We will return the right subtree if the right subtree returns a node. We will return `None` if the left and right subtrees return `None`.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def lowestCommonAncestor(self, root: 'TreeNode', nodes: 'List[TreeNode]') -> 'TreeNode':
        nodes = set(nodes)
        
        def _lowestCommonAncestor(root):
            if not root:
                return None
            if root in nodes:
                return root
            
            left, right = _lowestCommonAncestor(root.left), _lowestCommonAncestor(root.right)
            if left and right:
                return root
            return left or right
        
        return _lowestCommonAncestor(root)
```

Time Complexity: `O(n)` where `n` is the number of nodes in the tree. <br/>
Space Complexity: `O(n)` where `n` is the number of nodes in the tree.

