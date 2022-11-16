---
extends: _layouts.post
section: content
title: Construct binary search tree from preorder traversal
problemUrl: https://leetcode.com/problems/construct-binary-search-tree-from-preorder-traversal/
date: 2022-11-16
categories: [tree]
---

As preorder traversal is given, we know the first element will be the root. We will create a function witg a bound the maximum number it will handle. The left recursion will take the elements smaller than `node.val`, the right recursion will take the remaining elements smaller than bound.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def bstFromPreorder(self, preorder: List[int]) -> Optional[TreeNode]:
        return self.buildTree(preorder[::-1], math.inf)
        
    def buildTree(self, preorder: List[int], bound: int) -> Optional[TreeNode]:
        if not preorder or preorder[-1] > bound:
            return None
        
        node = TreeNode(preorder.pop())
        node.left = self.buildTree(preorder, node.val)
        node.right = self.buildTree(preorder, bound)
        
        return node
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`