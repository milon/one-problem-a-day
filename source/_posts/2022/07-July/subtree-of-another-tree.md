---
extends: _layouts.post
section: content
title: Subtree of another tree
problemUrl: https://leetcode.com/problems/subtree-of-another-tree/
date: 2022-07-14
categories: [tree]
---

We can check whether two tree are same using the same logic from [Same tree](/problems/same-tree) problem. Then we will check recursively for every subtree whether that is same as out target subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isSubtree(self, root: Optional[TreeNode], subRoot: Optional[TreeNode]) -> bool:
        if not subRoot: return True
        if not root: return False
        if self.sameTree(root, subRoot): return True
        return (self.isSubtree(root.left, subRoot) or self.isSubtree(root.right, subRoot))
    
    def sameTree(self, s: Optional[TreeNode], t: Optional[TreeNode]) -> bool:
        if not s and not t: return True
        if s and t and s.val == t.val:
            return self.sameTree(s.left, t.left) and self.sameTree(s.right, t.right)
        return False
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`