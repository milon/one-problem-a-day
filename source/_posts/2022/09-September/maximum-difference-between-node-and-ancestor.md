---
extends: _layouts.post
section: content
title: Maximum difference between node and ancestor
problemUrl: https://leetcode.com/problems/maximum-difference-between-node-and-ancestor/
date: 2022-09-11
categories: [tree]
---

We will keep track of both max value of the tree and min value of the tree from root to leaf. When we reach the leaf, we store the difference between these 2 in our result. We will run the same logic in both left and right subtree and finally return the maximum between both.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def maxAncestorDiff(self, root: Optional[TreeNode]) -> int:
        self.res = 0
        
        def maxDiff(root, maxVal, minVal):
            if not root:
                self.res = max(self.res, maxVal-minVal)
                return
            maxDiff(root.left, max(maxVal, root.val), min(minVal, root.val))
            maxDiff(root.right, max(maxVal, root.val), min(minVal, root.val))
            
        maxDiff(root, -math.inf, math.inf)
        return self.res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`