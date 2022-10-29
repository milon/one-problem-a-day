---
extends: _layouts.post
section: content
title: Search in a binary search tree
problemUrl: https://leetcode.com/problems/search-in-a-binary-search-tree/
date: 2022-10-29
categories: [tree]
---

We will traverse the tree in a depth-first manner. If the current node's value is equal to the target value, then we will return the current node. If the current node's value is greater than the target value, then we will search in the left subtree. If the current node's value is less than the target value, then we will search in the right subtree.

```python
class Solution:
    def searchBST(self, root: TreeNode, val: int) -> TreeNode:
        if not root:
            return None
        if root.val == val:
            return root
        if root.val > val:
            return self.searchBST(root.left, val)
        return self.searchBST(root.right, val)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`