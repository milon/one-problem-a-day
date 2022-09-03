---
extends: _layouts.post
section: content
title: Balance a binary search tree
problemUrl: https://leetcode.com/problems/balance-a-binary-search-tree/
date: 2022-09-03
categories: [tree]
---

We will first traverse the tree with inorder traversal, and append all the values to an array. Then we create a binary search tree with the values, where root will be the middle of the array, thus we make sure there are roughly same number of nodes in both left and right subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def balanceBST(self, root: TreeNode) -> TreeNode:
        values = []
        
        def inorder(root):
            if not root:
                return None
            inorder(root.left)
            values.append(root.val)
            inorder(root.right)
        
        inorder(root)
        
        def constructBST(values):
            if not values:
                return None
            
            mid = len(values)//2
            root = TreeNode(values[mid])
            root.left = constructBST(values[:mid])
            root.right = constructBST(values[mid+1:])
            return root
        
        return constructBST(values)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`