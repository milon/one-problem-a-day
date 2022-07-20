---
extends: _layouts.post
section: content
title: N-ary tree preorder traversal
problemUrl: https://leetcode.com/problems/n-ary-tree-preorder-traversal/
date: 2022-07-20
categories: [tree]
---

We will traverse the tree with recursive DFS, as it is preorder traversal, we first append the root to our result and then traverse all the children.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, children=None):
        self.val = val
        self.children = children
"""

class Solution:
    def preorder(self, root: 'Node') -> List[int]:
        res = []
        
        def traverse(root, res):
            if not root:
                return
            res.append(root.val)
            for child in root.children:
                traverse(child, res)
        
        traverse(root, res)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`