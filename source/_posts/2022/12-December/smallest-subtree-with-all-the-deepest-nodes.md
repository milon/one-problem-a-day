---
extends: _layouts.post
section: content
title: Smallest subtree with all the deepest nodes
problemUrl: https://leetcode.com/problems/smallest-subtree-with-all-the-deepest-nodes/
date: 2022-12-12
categories: [tree]
---

We will traverse the tree with DFS and it will return the deepest depth of the tree and the lowest common ancestor of the deepest leaves. We will keep on iterating over the nodes of the tree and we will check whether the current node is the root of the lowest common ancestor of the deepest leaves. If it is, we will update the lowest common ancestor to be the current node. We will keep on doing this until we have visited all the nodes of the tree. At the end, we will return the lowest common ancestor.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def subtreeWithAllDeepest(self, root: TreeNode) -> TreeNode:
        self.lca, self.deepest = None, 0

        def dfs(node, depth):
            self.deepest = max(self.deepest, depth)

            if not node:
                return depth
            
            left = dfs(node.left, depth+1)
            right = dfs(node.right, depth+1)

            if left == right == self.deepest:
                self.lca = node
            
            return max(left, right)

        dfs(root, 0)
        return self.lca
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
