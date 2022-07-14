---
extends: _layouts.post
section: content
title: Balanced binary tree
problemUrl: https://leetcode.com/problems/balanced-binary-tree/
date: 2022-07-14
categories: [tree]
---

We will traverse the tree with DFS and also keep track of the depth. Then return both the balanced and depth from our DFS recursion. Then we just compare whether the difference between the left and right subtree is not more than 1.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isBalanced(self, root: Optional[TreeNode]) -> bool:
        def dfs(root):
            if not root:
                return [True, 0]
            left, right = dfs(root.left), dfs(root.right)
            isBalanced = left[0] and right[0] and abs(left[1] - right[1]) <= 1
            return [isBalanced, 1+max(left[1], right[1])]
        return dfs(root)[0]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`