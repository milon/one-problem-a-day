---
extends: _layouts.post
section: content
title: Minimum absolute difference in bst
problemUrl: https://leetcode.com/problems/minimum-absolute-difference-in-bst/
date: 2022-11-01
categories: [tree]
---

We will traverse the tree with inorder traversal, that way we will get a sorted array. We will keep track of the minimum difference between two consecutive elements in the array, return it as the result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def getMinimumDifference(self, root: Optional[TreeNode]) -> int:
        def dfs(root):
            if not root:
                return []
            return dfs(root.left) + [root.val] + dfs(root.right)
        
        values = dfs(root)
        return min(b-a for a, b in zip(values, values[1:]))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`