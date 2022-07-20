---
extends: _layouts.post
section: content
title: Binary tree preorder traversal
problemUrl: https://leetcode.com/problems/binary-tree-preorder-traversal/
date: 2022-07-20
categories: [tree]
---

We will traverse the tree with recursive DFS, as it is preorder traversal, we first append the root, then the left subtree and then right subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def preorderTraversal(self, root: Optional[TreeNode]) -> List[int]:
        res = []
        
        def traverse(root, res):
            if not root:
                return
            res.append(root.val)
            traverse(root.left, res)
            traverse(root.right, res)
        
        traverse(root, res)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`