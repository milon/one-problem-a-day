---
extends: _layouts.post
section: content
title: Binary tree maximum path sum
problemUrl: https://leetcode.com/problems/binary-tree-maximum-path-sum/
date: 2022-08-06
categories: [tree]
---

We will calculate the sum of left subtree and right subtree and return the value of maximum of them added with the current node value from our recursive DFS method. In the process we will keep track of the maximum sum of both subtree added with the current node value. Once the DFS traversal is done, we will return the maximum sum.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def maxPathSum(self, root: Optional[TreeNode]) -> int:
        self.maxSum = -math.inf
        
        def dfs(node):
            if not node:
                return 0
            leftSum = max(0, dfs(node.left))
            rightSum = max(0, dfs(node.right))
            
            self.maxSum = max(self.maxSum, node.val+leftSum+rightSum)
            
            return max(leftSum, rightSum) + node.val
        
        dfs(root)
        return self.maxSum
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`