---
extends: _layouts.post
section: content
title: Insert into a binary search tree
problemUrl: https://leetcode.com/problems/insert-into-a-binary-search-tree/
date: 2022-11-16
categories: [tree]
---

We will use DFS for inserting. We recursively insert the left and right subtrees and then return the root. If the root is null, we return the new node. If the root is greater than the value, we insert the node in the left subtree, and if the root is less than the value, we insert the node in the right subtree.

```python
class Solution:
    def insertIntoBST(self, root: TreeNode, val: int) -> TreeNode:
        if not root:
            return TreeNode(val)

        if root.val > val:
            root.left = self.insertIntoBST(root.left, val)
        else:
            root.right = self.insertIntoBST(root.right, val)

        return root
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`