---
extends: _layouts.post
section: content
title: Count complete tree nodes
problemUrl: https://leetcode.com/problems/count-complete-tree-nodes/
date: 2022-09-04
categories: [tree]
---

We will count the height of the left and right subtree. If they are equal, then the it's a complete tree, so the number of node will be `2^n-1`. If it's not a complete tree, then the number of node will be 1 + number of nodes in the left subtree + number of nodes in the right subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def countNodes(self, root: Optional[TreeNode]) -> int:
        def heightLeft(root):
            height = 0
            while root:
                height += 1
                root = root.left
            return height
        
        def heightRight(root):
            height = 0
            while root:
                height += 1
                root = root.right
            return height
        
        def count(root):
            if not root:
                return 0
            
            hl = heightLeft(root)
            hr = heightRight(root)
            if hl == hr:
                return (2**hl)-1
            
            return 1 + count(root.left) + count(root.right)
        
        return count(root)
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(log(n))`