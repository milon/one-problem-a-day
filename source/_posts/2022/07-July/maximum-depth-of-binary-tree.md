---
extends: _layouts.post
section: content
title: Maximum depth of binary tree
problemUrl: https://leetcode.com/problems/maximum-depth-of-binary-tree/
date: 2022-07-14
categories: [tree]
---

We will traverse the tree with DFS and keep a counter to keep track of every level. Then we will take the maximum from both subtree and return the counter.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def maxDepth(self, root: Optional[TreeNode]) -> int:
        if not root:
            return 0
        return 1 + max(self.maxDepth(root.left), self.maxDepth(root.right))
```


Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`

