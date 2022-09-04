---
extends: _layouts.post
section: content
title: Construct binary tree from inorder and postorder traversal
problemUrl: https://leetcode.com/problems/construct-binary-tree-from-inorder-and-postorder-traversal/
date: 2022-09-04
categories: [tree]
---

We know, the last index of postorder traversal is always the root of the tree, from that info, we can find the root in inorder traversal too. From there, we will find the left inorder subtree and right inorder subtree and with the length of left and right inorder subtree, we can get the left and right preorder subtree. Now we can recursively build the tree. If the lenght of the inorder tree is 0, that is our base case, and we return a null node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def buildTree(self, inorder: List[int], postorder: List[int]) -> Optional[TreeNode]:
        if len(inorder) == 0:
            return None
        
        val = postorder[-1]
        mid = inorder.index(val)
        
        left_inorder = inorder[:mid]
        right_inorder = inorder[mid+1:]
        
        left_postorder = postorder[:len(left_inorder)]
        right_postorder = postorder[len(left_inorder):-1]
        
        left = self.buildTree(left_inorder, left_postorder)
        right = self.buildTree(right_inorder, right_postorder)
        
        return TreeNode(val, left, right)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`