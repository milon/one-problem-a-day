---
extends: _layouts.post
section: content
title: Recover binary search tree
problemUrl: https://leetcode.com/problems/recover-binary-search-tree/
date: 2022-09-04
categories: [tree]
---

We will traverse the tree with inorder traversal and add each nodes to the a list. Then we sort the values of each nodes, then iterate over the sorted values, and assign the values to respective tree nodes values.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def recoverTree(self, root: Optional[TreeNode]) -> None:
        def inorder(root):
            if not root:
                return []
            
            left = inorder(root.left)
            right = inorder(root.right)
            return [*left, root, *right]
        
        tree = inorder(root)
        sortedValues = sorted([node.val for node in tree])
        
        for i in range(len(sortedValues)):
            tree[i].val = sortedValues[i]
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`