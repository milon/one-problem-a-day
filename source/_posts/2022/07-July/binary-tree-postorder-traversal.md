---
extends: _layouts.post
section: content
title: Binary tree postorder traversal
problemUrl: https://leetcode.com/problems/binary-tree-postorder-traversal/
date: 2022-07-20
categories: [tree]
---

We will traverse the tree with recursive DFS, as it is postorder traversal, we first traverse the left subtree, the the right subtree and then append the root to our result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def postorderTraversal(self, root: Optional[TreeNode]) -> List[int]:
        res = []
        
        def traverse(root, res):
            if not root:
                return
            
            traverse(root.left, res)
            traverse(root.right, res)
            res.append(root.val)
        
        traverse(root, res)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`