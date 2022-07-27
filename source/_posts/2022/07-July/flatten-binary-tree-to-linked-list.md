---
extends: _layouts.post
section: content
title: Flatten binary tree to linked list
problemUrl: https://leetcode.com/problems/flatten-binary-tree-to-linked-list/
date: 2022-07-27
categories: [tree]
---

We will recursive move all the preorder traversal nodes to inorder. We keep track of previous node in very recursive call, move the right right subtree to a temporary variable, flatten the left subtree, move it to the right subtree to the left subtree, and make the left subtree null. Then  we assign the right subtree which is stored in the temporary variable to the right of the previous node we keep track of. We don't need to return anything as we do the replacement in place.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    prev = None
    
    def flatten(self, root: Optional[TreeNode]) -> None:
        if not root:
            return
        self.prev = root
        self.flatten(root.left)
        
        temp = root.right
        root.right, root.left = root.left, None
        self.prev.right = temp
        
        self.flatten(temp)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`, for the recursive call stack.