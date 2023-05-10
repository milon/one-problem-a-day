---
extends: _layouts.post
section: content
title: Increasing order search tree
problemUrl: https://leetcode.com/problems/increasing-order-search-tree/
date: 2023-05-09
categories: [tree]
---

We can just do an inorder traversal and keep track of the previous node. Then we will set the left child of the current node to `None` and the right child to the previous node. Finally, we will return the root node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def increasingBST(self, root: TreeNode, tail: TreeNode = None) -> TreeNode:
        if not root: return tail
        res = self.increasingBST(root.left, root)
        root.left = None
        root.right = self.increasingBST(root.right, tail)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`