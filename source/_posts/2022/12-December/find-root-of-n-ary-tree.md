---
extends: _layouts.post
section: content
title: Find root of N-ary tree
problemUrl: https://leetcode.com/problems/find-root-of-n-ary-tree/
date: 2022-12-08
categories: [tree]
---

We will sum up all the node values of the tree, then all the substruct all the children node values. The remaining value is the root node value.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, children=None):
        self.val = val
        self.children = children if children is not None else []
"""

class Solution:
    def findRoot(self, tree: List['Node']) -> 'Node':
        _sum = 0
        for node in tree:
            _sum += node.val - sum(child.val for child in node.children)
        
        for node in tree:
            if node.val == _sum:
                return node
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`