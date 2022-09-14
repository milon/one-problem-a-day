---
extends: _layouts.post
section: content
title: Insufficient nodes in root to leaf paths
problemUrl: https://leetcode.com/problems/insufficient-nodes-in-root-to-leaf-paths/
date: 2022-09-14
categories: [tree]
---

We will traverse the node with DFS and each time we reach a leaf node, we check for the insufficient node, if the node is insufficient, we delete it from the tree. After traversal of whole tree, we return the root node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def sufficientSubset(self, root: Optional[TreeNode], limit: int) -> Optional[TreeNode]:
        def dfs(root, curSum):
            if not root:
                return None
            
            if not root.left and not root.right:
                if root.val + curSum < limit:
                    return None
                return root
            
            root.left = dfs(root.left, root.val + curSum)
            root.right = dfs(root.right, root.val + curSum)
            
            if not root.left and not root.right:
                return None
            
            return root
        
        return dfs(root, 0)
```

Time Complexity: `O(n)`, n is the number of nodes <br/>
Space Complexity: `O(h)`, h is the height of the tree