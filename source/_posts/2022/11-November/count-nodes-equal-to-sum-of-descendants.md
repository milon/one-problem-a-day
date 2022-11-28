---
extends: _layouts.post
section: content
title: Count nodes equal to sum of descendants
problemUrl: https://leetcode.com/problems/count-nodes-equal-to-sum-of-descendants/
date: 2022-11-28
categories: [tree]
---

We will use DFS in post order traversal to solve the problem. We will recursively call the function on the left and right child of the root. Then we will check if the sum of the left and right child is equal to the root. If it is, we will increment the result by 1. Finally, we will return the sum of the left and right child plus the root.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def equalToDescendants(self, root: Optional[TreeNode]) -> int:
        self.count = 0
        
        def dfs(root):
            if not root:
                return 0
            
            left = dfs(root.left)
            right = dfs(root.right)
            
            if left + right == root.val:
                self.count += 1
            
            return left + right + root.val
        
        dfs(root)
        return self.count
```

Time complexity: `O(n)`, n is the number of nodes in the tree <br/>
Space complexity: `O(n)`