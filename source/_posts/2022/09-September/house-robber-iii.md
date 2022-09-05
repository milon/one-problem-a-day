---
extends: _layouts.post
section: content
title: House robber III
problemUrl: https://leetcode.com/problems/house-robber-iii/
date: 2022-09-05
categories: [graph]
---

We will traverse the tree in DFS and take both with and without root result. Then we calculate the max from both of them and return the result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def rob(self, root: Optional[TreeNode]) -> int:
        def dfs(root):
            if not root:
                return (0, 0)
            
            left = dfs(root.left)
            right = dfs(root.right)
            
            with_root = root.val + left[1] + right[1]
            without_root = max(left) + max(right)
            
            return (with_root, without_root)
        
        return max(dfs(root))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`