---
extends: _layouts.post
section: content
title: Root equals sum of children
problemUrl: https://leetcode.com/problems/root-equals-sum-of-children/
date: 2022-12-17
categories: [tree]
---

We will check the value of root with the sum of the rest of the tree. If the value of root is equal to the sum of the rest of the tree, then we will return `True`. Otherwise, we will return `False`.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def checkTree(self, root: Optional[TreeNode]) -> bool:
        return root.val == root.left.val + root.right.val
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`