---
extends: _layouts.post
section: content
title: Flip equivalent binary trees
problemUrl: https://leetcode.com/problems/flip-equivalent-binary-trees/
date: 2022-10-09
categories: [tree]
---

We will start traversing both tree with DFS and check whether the left subtree and right subtree are equal for both tree or left subtree is equal to right subtree and vice-versa both tree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def flipEquiv(self, root1: Optional[TreeNode], root2: Optional[TreeNode]) -> bool:
        if not root1 or not root2:
            return root1 == root2 == None
        
        return (root1.val == root2.val and 
            ((self.flipEquiv(root1.left, root2.left) and self.flipEquiv(root1.right, root2.right)) or
            (self.flipEquiv(root1.left, root2.right) and self.flipEquiv(root1.right, root2.left))))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
