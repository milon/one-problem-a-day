---
extends: _layouts.post
section: content
title: Diameter of binary tree
problemUrl: https://leetcode.com/problems/diameter-of-binary-tree/
date: 2022-07-14
categories: [tree]
---

We can calculate the depth of a subtree with DFS. Then we add both subtree and store it in our running answer. After the whole tree traversal is done, we return our running answer.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def diameterOfBinaryTree(self, root: Optional[TreeNode]) -> int:
        self.answer = 0
        
        def height(root):
            if not root:
                return 0
            left, right = height(root.left), height(root.right)
            self.answer = max(self.answer, left+right)
            return 1 + max(left, right)
        
        height(root)
        return self.answer
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`