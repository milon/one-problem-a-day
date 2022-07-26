---
extends: _layouts.post
section: content
title: Lowest common ancestor of a binary search tree
problemUrl: https://leetcode.com/problems/lowest-common-ancestor-of-a-binary-search-tree/
date: 2022-07-18
categories: [tree]
---

We are guranteed to find a common ansestor. That means if the 2 values of p and q have their value both on left side or the tree root, right side of the tree root or opposite side of tree root. As it's a binary search tree, that means if both of the values are opposite side of the root, that means root is the common ansestor. We can use this as out base case, and solve the problem with recursion.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def lowestCommonAncestor(self, root: 'TreeNode', p: 'TreeNode', q: 'TreeNode') -> 'TreeNode':
        if p.val > root.val and q.val > root.val:
            return self.lowestCommonAncestor(root.right, p, q)
        elif p.val < root.val and q.val < root.val:
            return self.lowestCommonAncestor(root.left, p, q)
        else:
            # we are guranteed to find a common ansestor
            return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)` 