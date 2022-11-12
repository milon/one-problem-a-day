---
extends: _layouts.post
section: content
title: Leaf similar trees
problemUrl: https://leetcode.com/problems/leaf-similar-trees/
date: 2022-11-12
categories: [tree]
---

We will run a depth-first search on both trees and compare the leaves.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def leafSimilar(self, root1: Optional[TreeNode], root2: Optional[TreeNode]) -> bool:
        def findLeaves(root, res):
            if not root:
                return
            
            if not root.left and not root.right:
                res.append(root.val)
                return
                
            findLeaves(root.left, res)
            findLeaves(root.right, res)
        
        root1Leaves, root2Leaves = [], []
        findLeaves(root1, root1Leaves)
        findLeaves(root2, root2Leaves)
        
        return root1Leaves == root2Leaves
```

```python
class Solution:
    def leafSimilar(self, root1: Optional[TreeNode], root2: Optional[TreeNode]) -> bool:
        def findleaf(root: Optional[TreeNode]) -> List[int]:
            if not root: 
                return []
            if not (root.left or root.right): 
                return [root.val]
            
            return findleaf(root.left) + findleaf(root.right)

        return findleaf(root1) == findleaf(root2)
```

We can also achieve the same result by using a python generator instead.

```python
class Solution:
    def leafSimilar(self, root1: TreeNode, root2: TreeNode) -> bool:
        def dfs(node):
            if not node:
                return
            if not node.left and not node.right:
                yield node.val
            yield from dfs(node.left)
            yield from dfs(node.right)
            
        return list(dfs(root1)) == list(dfs(root2))
```

Time Complexity: `O(n+m)` <br/>
Space Complexity: `O(n+m)`