---
extends: _layouts.post
section: content
title: Create binary tree from descriptions
problemUrl: https://leetcode.com/problems/create-binary-tree-from-descriptions/
date: 2022-12-31
categories: [tree]
---

We will use a dictionary to store the nodes. We will iterate over the descriptions and for each description we will create a node and store it in the dictionary. Then we will iterate over the descriptions again and for each description we will check if the node has a left child and if it does we will add it to the left child of the node. Then we will check if the node has a right child and if it does we will add it to the right child of the node. Finally we will return the root node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def createBinaryTree(self, descriptions: List[List[int]]) -> Optional[TreeNode]:
        children = set()
        tree = {}
        for parent, child, isLeft in descriptions:
            newParent = tree.setdefault(parent, TreeNode(parent))
            newChild = tree.setdefault(child, TreeNode(child))
            if isLeft:
                newParent.left = newChild
            else:
                newParent.right = newChild
            children.add(child)
            
        root = (set(tree) - set(children)).pop()
        return tree[root]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`