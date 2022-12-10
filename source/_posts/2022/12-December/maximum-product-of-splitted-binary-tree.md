---
extends: _layouts.post
section: content
title: Maximum product of splitted binary tree
problemUrl: https://leetcode.com/problems/maximum-product-of-splitted-binary-tree/
date: 2022-12-10
categories: [tree]
---

We will calculate the sum of all nodes in the tree and then we will calculate the sum of all nodes in the left and right subtrees. The answer will be the maximum of the product of the sum of the left and right subtrees and the product of the sum of the left and right subtrees and the sum of the rest of the nodes in the tree.

```python
class Solution:
    def maxProduct(self, root: TreeNode) -> int:
        def getSum(root: Optional[TreeNode]) -> int:
            if not root:
                return 0
            return root.val + getSum(root.left) + getSum(root.right)
        
        self.sum = getSum(root)
        self.res = -1

        def dfs(root: Optional[TreeNode]) -> int:
            if not root:
                return 0
            left = dfs(root.left)
            right = dfs(root.right)
            
            val = root.val + left + right
            multiplication = (self.sum-val)*val
            self.res = max(self.res, multiplication)
            
            return val
        
        dfs(root)
        return self.res % (10**9+7)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`