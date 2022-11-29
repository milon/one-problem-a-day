---
extends: _layouts.post
section: content
title: Count univalue subtrees
problemUrl: https://leetcode.com/problems/count-univalue-subtrees/
date: 2022-11-29
categories: [tree]
---

We will use postorder traversal to count the number of univalue subtrees. We will also use a helper function to check if the current node is a univalue subtree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def countUnivalSubtrees(self, root: Optional[TreeNode]) -> int:
        self.count = 0
        
        def dfs(root, parent=None):
            if not root:
                return True
            
            left = dfs(root.left, root.val)
            right = dfs(root.right, root.val)
            if left and right:
                self.count += 1
            
            return left and right and root.val == parent
        
        dfs(root)
        return self.count
```

Time complexity: `O(n)`, n is the number of nodes in the tree <br/>
Space complexity: `O(n)`