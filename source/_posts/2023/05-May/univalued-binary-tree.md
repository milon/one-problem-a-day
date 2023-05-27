---
extends: _layouts.post
section: content
title: Univalued binary tree
problemUrl: https://leetcode.com/problems/univalued-binary-tree/
date: 2023-05-27
categories: [tree]
---

We can use depth-first search to solve the problem. We will use a variable `val` to store the value of the root node. Then we will recursively check if the value of the current node is equal to `val`. If it is not, we will return `False`. Otherwise, we will recursively check if the left and right subtrees are univalued. Finally, we will return `True`. 

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isUnivalTree(self, root: Optional[TreeNode]) -> bool:
        if not root:
            return True
        
        if root.left:
            if root.val != root.left.val:
                return False
        
        if root.right:
            if root.val != root.right.val:
                return False
        
        return self.isUnivalTree(root.left) and self.isUnivalTree(root.right)
```

Time complexity: `O(n)` where `n` is the number of nodes in the tree <br/>
Space complexity: `O(h)` where `h` is the height of the tree