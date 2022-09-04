---
extends: _layouts.post
section: content
title: delete-node-in-a-bst
problemUrl: https://leetcode.com/problems/delete-node-in-a-bst/
date: 2022-09-04
categories: [tree]
---

We will check whether the key is greater than root, then the key is in right subtree, if the key is less than root, then key is in left subtree. If the key is the root, then we check, if there is a no left or right subtree, then we return null. If there is a left subtree and no right subtree, return the left subtree, as same if there is a right subtree and no left subtree, return right subtree. If there is both, then, take the right most element, replace it with the root value, and then recursively delete the right most key.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def deleteNode(self, root: Optional[TreeNode], key: int) -> Optional[TreeNode]:
        if not root:
            return root
        
        if root.val > key:
            root.left = self.deleteNode(root.left, key)
        elif root.val < key:
            root.right = self.deleteNode(root.right, key)
        else:
            if not root.left and not root.right:
                return None
            elif not root.left and root.right:
                return root.right
            elif root.left and not root.right:
                return root.left
            
            dummy = root.right
            while dummy.left:
                dummy = dummy.left
            root.val = dummy.val
            root.right = self.deleteNode(root.right, root.val)
        
        return root
```

Time Complexity: `O(log(n))`, where n is the number of nodes, log(n) is the height of the tree <br/>
Space Complexity: `O(log(n))`