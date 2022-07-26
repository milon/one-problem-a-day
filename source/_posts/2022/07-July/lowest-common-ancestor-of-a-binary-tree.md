---
extends: _layouts.post
section: content
title: Lowest common ancestor of a binary tree
problemUrl: https://leetcode.com/problems/lowest-common-ancestor-of-a-binary-tree/
date: 2022-07-26
categories: [tree]
---

We check if p or q are equal to root, then we return root as we are guranteed to have a common ansestor. If not then we recursively call the function for both left and right subtree. If we found both, then root is our answer, else left or right is our answer.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def lowestCommonAncestor(self, root: 'TreeNode', p: 'TreeNode', q: 'TreeNode') -> 'TreeNode':
        if root == p or root == q:
            return root
        
        left = right = None
        if root.left:
            left = self.lowestCommonAncestor(root.left, p, q)
        if root.right:
            right = self.lowestCommonAncestor(root.right, p, q)
        
        if left and right:
            return root
        else:
            return left or right
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`