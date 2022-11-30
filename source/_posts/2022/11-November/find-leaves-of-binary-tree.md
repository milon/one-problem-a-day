---
extends: _layouts.post
section: content
title: Find leaves of binary tree
problemUrl: https://leetcode.com/problems/find-leaves-of-binary-tree/
date: 2022-11-30
categories: [tree]
---

We will traverse the tree in post-order fashion. For each node, we will check if it is a leaf node. If it is, we will append the value of the node in a list. Then we will check if the left and right child of the node are leaf nodes. If they are, we will set the left and right child of the node to `None`.

We will return the list of leaf nodes.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findLeaves(self, root: Optional[TreeNode]) -> List[List[int]]:
        res = collections.defaultdict(list)
        
        def dfs(root):
            if not root:
                return 0
            
            left = dfs(root.left)
            right = dfs(root.right)
            
            level = max(left, right) + 1
            res[level].append(root.val)
            
            return level
        
        dfs(root)
        return res.values()
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`