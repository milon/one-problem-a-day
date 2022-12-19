---
extends: _layouts.post
section: content
title: Clone binary tree with random pointer
problemUrl: https://leetcode.com/problems/clone-binary-tree-with-random-pointer/
date: 2022-12-19
categories: [tree]
---

We will use a hashmap to store the mapping between the original node and the cloned node. Then we will iterate over the hashmap and clone the random pointer.

```python
class Solution:
    def copyRandomBinaryTree(self, root: 'Node') -> 'NodeCopy':
        if not root:
            return None

        mapping = {}
        def clone(node):
            if not node:
                return None
            if node in mapping:
                return mapping[node]
            newNode = NodeCopy(node.val)
            mapping[node] = newNode
            newNode.left = clone(node.left)
            newNode.right = clone(node.right)
            return newNode
        
        clone(root)
        for node in mapping:
            if node.random:
                mapping[node].random = mapping[node.random]
        
        return mapping[root]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`