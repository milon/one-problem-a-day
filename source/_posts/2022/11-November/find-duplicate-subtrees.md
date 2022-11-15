---
extends: _layouts.post
section: content
title: Find duplicate subtrees
problemUrl: https://leetcode.com/problems/find-duplicate-subtrees/
date: 2022-11-15
categories: [tree]
---

We will use DFS and do preorder traversal to find all the subtrees. Then we can use a hash map to store the frequency of each subtree. If the frequency of a subtree is greater than 1, then we can add it to the result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findDuplicateSubtrees(self, root: Optional[TreeNode]) -> List[Optional[TreeNode]]:
        res, lookup = [], {}
        
        def dfs(root: Optional[TreeNode], path: str) -> str:
            if not root:
                return '#'
            
            left = dfs(root.left, path)
            right = dfs(root.right, path)
            
            path += ','.join([str(root.val), left, right])
            
            if path in lookup:
                lookup[path] += 1
                if lookup[path] == 2:
                    res.append(root)
            else:
                lookup[path] = 1
                
            return path
        
        dfs(root, '')
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`