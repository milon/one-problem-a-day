---
extends: _layouts.post
section: content
title: Find distance in a binary tree
problemUrl: https://leetcode.com/problems/find-distance-in-a-binary-tree/
date: 2022-12-21
categories: [tree]
---

We will use a recursive function to find the distance between two nodes. The function will return the distance between the two nodes if both nodes are in the tree. Otherwise, it will return `-1`. If the current node is one of the two nodes, we will return `0`. Otherwise, we will find the distance between the two nodes in the left subtree and the right subtree. If both distances are `-1`, we will return `-1`. Otherwise, we will return the sum of the two distances plus `1`.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findDistance(self, root: Optional[TreeNode], p: int, q: int) -> int:
        self.res = 0

        def dfs(node, h):
            if not node:
                return 0
            
            curr = None
            if node.val == p or node.val == q:
                curr = h
            
            left = dfs(node.left, h+1)
            right = dfs(node.right, h+1)

            if left and right:
                self.res = left + right - 2*h  # Make sure to substract common height
            if left and curr != None:
                self.res = left - h            # Make sure to substract common height
            if right and curr != None:
                self.res = right - h           # Make sure to substract common height
                
            return curr or left or right

        dfs(root, 0)
        return self.res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`