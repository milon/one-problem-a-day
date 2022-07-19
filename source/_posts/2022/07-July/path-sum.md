---
extends: _layouts.post
section: content
title: Path sum
problemUrl: https://leetcode.com/problems/path-sum/
date: 2022-07-19
categories: [tree]
---

We can run DFS from root to leaf and calculate whether the target is equal to the sum of all nodes. We can do it recursively. Our base case will be if the node is empty, then we will return false and if the node is a leaf node, we will check the value is equal to target. And in each iteration of the recursion, we will substruct the node value from the target.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def hasPathSum(self, root: Optional[TreeNode], targetSum: int) -> bool:
        if not root:
            return False
        if not root.left and not root.right:
            return targetSum == root.val
        return self.hasPathSum(root.left, targetSum-root.val) or self.hasPathSum(root.right, targetSum-root.val)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`, for recursive call stack


