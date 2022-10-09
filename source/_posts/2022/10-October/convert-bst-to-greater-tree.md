---
extends: _layouts.post
section: content
title: Convert bst to greater tree
problemUrl: https://leetcode.com/problems/convert-bst-to-greater-tree/
date: 2022-10-09
categories: [tree]
---

We will iterate over the tree in reverse inorder and keep track of the sum of all the nodes we have traversed so far. We will add the sum to the current node and update the sum with the current node value.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def convertBST(self, root: Optional[TreeNode]) -> Optional[TreeNode]:
        def _change(node, val):
            if node:
                node.val += _change(node.right, val)
                return _change(node.left, node.val)
            else:
                return val
        
        _change(root, 0)
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`