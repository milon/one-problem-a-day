---
extends: _layouts.post
section: content
title: Binary tree tilt
problemUrl: https://leetcode.com/problems/binary-tree-tilt/
date: 2022-11-15
categories: [tree]
---

We will use DFS to find the tilt of each subtree and then add them together.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findTilt(self, root: Optional[TreeNode]) -> int:
        self.tiltSum = 0
        
        def dfs(root: Optional[TreeNode]) -> int:
            if not root:
                return 0
            
            left = dfs(root.left)
            right = dfs(root.right)
            self.tiltSum += abs(left - right)
            
            return root.val + left + right
        
        dfs(root)
        return self.tiltSum
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`