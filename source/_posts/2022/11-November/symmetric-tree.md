---
extends: _layouts.post
section: content
title: Symmetric tree
problemUrl: https://leetcode.com/problems/symmetric-tree/
date: 2022-11-17
categories: [tree]
---

We will create a function `isMirror` which will take two nodes as input. If both the nodes are `None`, we will return `True`. If one of the nodes is `None`, we will return `False`. If the values of the nodes are not equal, we will return `False`. We will recursively call the function with the left child of the first node and the right child of the second node and the right child of the first node and the left child of the second node. If both the recursive calls return `True`, we will return `True`. Otherwise, we will return `False`.

```python
class Solution:
    def isSymmetric(self, root: TreeNode) -> bool:
        def isMirror(node1, node2):
            if node1 is None and node2 is None:
                return True
            if node1 is None or node2 is None:
                return False
            if node1.val != node2.val:
                return False
            return isMirror(node1.left, node2.right) and isMirror(node1.right, node2.left)
        return isMirror(root, root)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`