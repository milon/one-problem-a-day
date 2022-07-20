---
extends: _layouts.post
section: content
title: N-ary tree postorder traversal
problemUrl: https://leetcode.com/problems/n-ary-tree-postorder-traversal/
date: 2022-07-20
categories: [tree]
---

We will traverse the tree with recursive DFS, as it is postorder traversal, we first traverse all the children and then append the root to our result.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, children=None):
        self.val = val
        self.children = children
"""

class Solution:
    def postorder(self, root: 'Node') -> List[int]:
        res = []
        
        def traverse(root, res):
            if not root:
                return 
            for node in root.children:
                traverse(node, res)
            res.append(root.val)
            
        traverse(root, res)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`