---
extends: _layouts.post
section: content
title: Diameter of N-ary tree
problemUrl: https://leetcode.com/problems/diameter-of-n-ary-tree/
date: 2023-05-17
categories: [tree]
---

We will use recursive DFS to find out the longest path in the tree. The longest path will be the diameter of the tree.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, children=None):
        self.val = val
        self.children = children if children is not None else []
"""

class Solution:
    def diameter(self, root: 'Node') -> int:
        self.res = 0
        
        def dfs(node: 'Node') -> int:
            if not node:
                return 0
            maxDepth = 0
            for i in node.children:
                cur = dfs(i)
                self.res = max(self.res, maxDepth + cur)
                maxDepth = max(maxDepth, cur)
            return 1 + maxDepth
        
        dfs(root)
        return self.res
```

Time complexity: `O(n)` where n is the number of nodes in the tree.
Space complexity: `O(h)` where h is the height of the tree.
