---
extends: _layouts.post
section: content
title: Trim a binary search tree
problemUrl: https://leetcode.com/problems/trim-a-binary-search-tree/
date: 2022-11-16
categories: [tree]
---

We will use DFS for trimming. We recursively trim the left and right subtrees and then return the root. If the root is less than `low`, we return the right subtree, and if the root is greater than `high`, we return the left subtree. If the root is in the range, we return the root.

```python
class Solution:
    def trimBST(self, root: TreeNode, low: int, high: int) -> TreeNode:
        if not root:
            return None
        if root.val < low:
            return self.trimBST(root.right, low, high)
        if root.val > high:
            return self.trimBST(root.left, low, high)

        root.left = self.trimBST(root.left, low, high)
        root.right = self.trimBST(root.right, low, high)
        return root
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`