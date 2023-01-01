---
extends: _layouts.post
section: content
title: Two sum bsts
problemUrl: https://leetcode.com/problems/two-sum-bsts/
date: 2023-01-01
categories: [tree]
---

We will traverse the tree and store the values in a set. Then we will iterate over the set and check if `target - num` is in the set.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def twoSumBSTs(self, root1: Optional[TreeNode], root2: Optional[TreeNode], target: int) -> bool:
        def dfs(node):
            if not node:
                return []
            return dfs(node.left) + dfs(node.right) + [node.val]
        
        q1 = set(dfs(root1))
        return any(target - a in q1 for a in dfs(root2))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
