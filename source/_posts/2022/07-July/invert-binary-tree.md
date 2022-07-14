---
extends: _layouts.post
section: content
title: Invert binary tree
problemUrl: https://leetcode.com/problems/invert-binary-tree/
date: 2022-07-14
categories: [tree]
---

We can take the left subtree and right subtree and swap their position. We will do it recursively for every subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def invertTree(self, root: Optional[TreeNode]) -> Optional[TreeNode]:
        if not root:
            return root
        root.left, root.right = root.right, root.left
        self.invertTree(root.left)
        self.invertTree(root.right)
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`