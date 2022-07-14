---
extends: _layouts.post
section: content
title: Maximum depth of n-ary tree
problemUrl: https://leetcode.com/problems/maximum-depth-of-n-ary-tree/
date: 2022-07-14
categories: [tree]
---

We will traverse the tree with DFS and keep a counter to keep track of every level. Then we will take the maximum from all of those level and return the counter.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, children=None):
        self.val = val
        self.children = children
"""

class Solution:
    def maxDepth(self, root: 'Node') -> int:
        if not root:
            return 0
        maxDepth = 0
        for c in root.children:
            maxDepth = max(maxDepth, self.maxDepth(c))
        return 1 + maxDepth
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
