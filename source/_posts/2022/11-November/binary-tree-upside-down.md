---
extends: _layouts.post
section: content
title: Binary tree upside down
problemUrl: https://leetcode.com/problems/binary-tree-upside-down/
date: 2022-11-27
categories: [tree]
---

We will use recursive DFS to solve the problem. We will recursively call the function on the left child of the root. Then we will set the left child of the root to the right child of the root. Then we will set the right child of the root to the root. Finally, we will set the root to null.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def upsideDownBinaryTree(self, root: Optional[TreeNode]) -> Optional[TreeNode]:
        if not root or not root.left:
            return root
        
        newRoot = self.upsideDownBinaryTree(root.left)
        root.left.left = root.right
        root.left.right = root
        root.left = None
        root.right = None
        
        return newRoot
```

Time complexity: `O(n)`, n is the number of nodes in the tree <br/>
Space complexity: `O(n)`