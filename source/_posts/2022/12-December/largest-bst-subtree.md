---
extends: _layouts.post
section: content
title: largest-bst-subtree
problemUrl: https://leetcode.com/problems/largest-bst-subtree/
date: 2022-12-06
categories: [tree]
---

We will use a recursive function to check if the tree is a BST or not. If it is, we will return the size of the tree. If it's not, we will return the maximum size of the left and right subtrees.

```python
class Solution:
    def largestBSTSubtree(self, root: TreeNode) -> int:
        def isBST(root, minVal, maxVal):
            if not root:
                return True
            if root.val <= minVal or root.val >= maxVal:
                return False
            return isBST(root.left, minVal, root.val) and isBST(root.right, root.val, maxVal)
        
        def size(root):
            if not root:
                return 0
            return 1 + size(root.left) + size(root.right)
        
        if not root:
            return 0

        if isBST(root, -math.inf, math.inf):
            return size(root)

        return max(self.largestBSTSubtree(root.left), self.largestBSTSubtree(root.right))
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`