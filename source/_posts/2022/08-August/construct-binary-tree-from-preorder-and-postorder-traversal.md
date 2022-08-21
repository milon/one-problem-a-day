---
extends: _layouts.post
section: content
title: Construct binary tree from preorder and postorder traversal
problemUrl: https://leetcode.com/problems/construct-binary-tree-from-preorder-and-postorder-traversal/
date: 2022-08-21
categories: [tree]
---

We know, the first value of preorder traversal is always the root. From than we can determine the the left subtree's preorder and postorder traversal, and right subtree's preorder and postorder traversal. From that we can recursively call out build tree function to get the left and right subtree, attach it to our root and return that.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def constructFromPrePost(self, preorder: List[int], postorder: List[int]) -> Optional[TreeNode]:
        if not preorder:
            return None
        
        if len(preorder) == 1:
            return TreeNode(preorder[0])
        
        idx = postorder.index(preorder[1])
        left_preorder = preorder[1:idx+2]
        left_postorder = postorder[:idx+1]
        
        right_preorder = preorder[idx+2:]
        right_postorder = postorder[idx+1:-1]
        
        root = TreeNode(preorder[0])
        root.left = self.constructFromPrePost(left_preorder, left_postorder)
        root.right = self.constructFromPrePost(right_preorder, right_postorder)
        
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`