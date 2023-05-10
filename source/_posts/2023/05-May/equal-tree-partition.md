---
extends: _layouts.post
section: content
title: Equal tree partition
problemUrl: https://leetcode.com/problems/equal-tree-partition/
date: 2023-05-10
categories: [tree]
---

Cutting an edge means cutting off a proper subtree (i.e., a subtree but not the whole tree). I collect the sums of these proper subtrees in a set and check whether half the total tree sum is a possible cut.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def checkEqualTree(self, root: Optional[TreeNode]) -> bool:
        def sum(node):
            if not node:
                return 0
            s = node.val + sum(node.left) + sum(node.right)
            if node is not root:
                cuts.add(s)
            return s
        
        cuts = set()
        return sum(root) / 2 in cuts
```

Time complexity: `O(n)`, where `n` is the number of nodes in the tree <br/>
Space complexity: `O(n)`