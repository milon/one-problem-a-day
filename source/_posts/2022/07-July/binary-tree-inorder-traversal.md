---
extends: _layouts.post
section: content
title: Binary tree inorder traversal
problemUrl: https://leetcode.com/problems/binary-tree-inorder-traversal/
date: 2022-07-20
categories: [tree]
---

We will traverse the tree with recursive DFS, as it is inorder traversal, we first traverse the left subtree then append the root, and lastly we traverse the right subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def inorderTraversal(self, root: Optional[TreeNode]) -> List[int]:
        res = []
        
        def traverse(root, res):
            if not root:
                return
            
            traverse(root.left, res)
            res.append(root.val)
            traverse(root.right, res)
        
        traverse(root, res)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`