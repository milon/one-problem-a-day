---
extends: _layouts.post
section: content
title: Binary tree pruning
problemUrl: https://leetcode.com/problems/binary-tree-pruning/
date: 2022-09-06
categories: [tree]
---

We will do a recursive DFS and check there the leaf node is 0 if 1, if it's 0, we remove it. Finally return the tree root.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def pruneTree(self, root: Optional[TreeNode]) -> Optional[TreeNode]:
        if not root: 
            return None

        root.left = self.pruneTree(root.left)
        root.right = self.pruneTree(root.right)

        if root.val == 0 and not root.left and not root.right:
            return None

        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`