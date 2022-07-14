---
extends: _layouts.post
section: content
title: Construct binary tree from preorder and inorder traversal
problemUrl: https://leetcode.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/
date: 2022-07-14
categories: [tree]
---

The first element of the preorder traversal is always the root. So, if we know the root, we can then find the left and right sub tree from inorder traversal. We will then create the tree recursively form this 2 traversal. As the members of the tree are unique, we don't have to worry about misplacement.

```python
class Solution:
    def buildTree(self, preorder: List[int], inorder: List[int]) -> Optional[TreeNode]:
        inorderMapping = {}
        for k, v in enumerate(inorder):
            inorderMapping[v] = k
        
        index = 0
        def treeBuilder(left, right):
            nonlocal index
            if left > right:
                return None
            rootVal = preorder[index]
            root = TreeNode(rootVal)
            index += 1
            root.left = treeBuilder(left, inorderMapping[rootVal]-1)
            root.right = treeBuilder(inorderMapping[rootVal]+1, right)
            return root
        
        return treeBuilder(0, len(preorder)-1)
```

We traverse the whole tree only once, so the time complexity is `O(n)`. We also create a hashmap for mapping inorder position, so the space complexity is also `O(n)`.