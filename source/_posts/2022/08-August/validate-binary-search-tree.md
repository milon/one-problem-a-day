---
extends: _layouts.post
section: content
title: Validate binary search tree
problemUrl: https://leetcode.com/problems/validate-binary-search-tree/
date: 2022-08-06
categories: [linked-list]
---

We will run a DFS, and each iteration we will compare the value of the node with a left and right value, which we will pass along each iteration. For root, this values will be negative and positive infinity.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isValidBST(self, root: Optional[TreeNode]) -> bool:
        def isValid(node, left, right):
            if not node:
                return True
            if not (node.val > left and node.val < right):
                return False
            return isValid(node.left, left, node.val) and isValid(node.right, node.val, right)
        
        return isValid(root, -math.inf, math.inf)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`