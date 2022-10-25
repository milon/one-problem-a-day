---
extends: _layouts.post
section: content
title: Reverse odd levels of binary tree
problemUrl: https://leetcode.com/problems/reverse-odd-levels-of-binary-tree/
date: 2022-10-25
categories: [tree]
---

we will use preorder traversal to reverse the odd levels of the tree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def reverseOddLevels(self, root: Optional[TreeNode]) -> Optional[TreeNode]:
        if not root:
            return root
        
        def dfs(node1, node2, level):
            if not node1 or not node2:
                return
            if level % 2 != 0:
                node1.val, node2.val = node2.val, node1.val
            
            dfs(node1.left, node2.right, level+1)
            dfs(node1.right, node2.left, level+1)
        
        dfs(root.left, root.right, 1)
        return root
```

Time complexity: O(n), where n is the number of nodes in the tree. <br/>
Space complexity: O(h) where h is the height of the tree