---
extends: _layouts.post
section: content
title: Delete leaves with a given value
problemUrl: https://leetcode.com/problems/delete-leaves-with-a-given-value/
date: 2022-10-16
categories: [tree]
---

We will use recursion to solve this problem. If the current node is a leaf and its value is the target value, we will return `None`. Otherwise, we will recursively call the function on the left and right child. If the left child is `None`, we will return the right child, and vice versa. Finally, we will return the current node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def removeLeafNodes(self, root: Optional[TreeNode], target: int) -> Optional[TreeNode]:
        if root.left: 
            root.left = self.removeLeafNodes(root.left, target)
        if root.right: 
            root.right = self.removeLeafNodes(root.right, target)
        
        return None if root.left == root.right == None and root.val == target else root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(h)`, h is the height of the tree
