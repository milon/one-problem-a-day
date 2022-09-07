---
extends: _layouts.post
section: content
title: Construct string from binary tree
problemUrl: https://leetcode.com/problems/construct-string-from-binary-tree/
date: 2022-09-07
categories: [tree]
---

We will use recursive DFS to traverse the tree and append the result to a string and return it.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def tree2str(self, root: Optional[TreeNode]) -> str:
        left, right="", ""
        
        if root.left:
            left = f"({self.tree2str(root.left)})"
        if root.right:
            right = f"({self.tree2str(root.right)})"
        
        if root.left is None and root.right is not None:
            return str(root.val) + "()" + right
        
        return str(root.val) + left + right
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`