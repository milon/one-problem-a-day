---
extends: _layouts.post
section: content
title: Delete nodes and return forest
problemUrl: https://leetcode.com/problems/delete-nodes-and-return-forest/
date: 2022-11-16
categories: [tree]
---

We will use DFS for deleting the nodes. We recursively delete the left and right subtrees and then return the root. If the root is in the set, we return the left and right subtrees, and if the root is not in the set, we return the root.

```python
class Solution:
    def delNodes(self, root: TreeNode, to_delete: List[int]) -> List[TreeNode]:
        to_delete = set(to_delete)
        ans = []

        def dfs(node):
            if not node:
                return None

            node.left = dfs(node.left)
            node.right = dfs(node.right)

            if node.val in to_delete:
                if node.left:
                    ans.append(node.left)
                if node.right:
                    ans.append(node.right)
                return None

            return node

        root = dfs(root)
        if root:
            ans.append(root)
        return ans
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`