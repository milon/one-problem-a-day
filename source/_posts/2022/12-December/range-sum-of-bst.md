---
extends: _layouts.post
section: content
title: Range sum of bst
problemUrl: https://leetcode.com/problems/range-sum-of-bst/
date: 2022-12-07
categories: [tree]
---

We will traverse the tree with DFS and add the value to the sum if it is in the range.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def rangeSumBST(self, root: Optional[TreeNode], low: int, high: int) -> int:
        self.sum = 0
        def dfs(root):
            if not root:
                return
            if low <= root.val <= high:
                self.sum += root.val
            dfs(root.left)
            dfs(root.right)
        dfs(root)
        return self.sum
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`