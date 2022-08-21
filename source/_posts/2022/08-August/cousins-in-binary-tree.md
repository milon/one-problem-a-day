---
extends: _layouts.post
section: content
title: Cousins in binary tree
problemUrl: https://leetcode.com/problems/cousins-in-binary-tree/
date: 2022-08-21
categories: [tree]
---

We will run a BFS in the tree, and will keep track of the parents, if we find a parent, in a level for one node, we will return false, if we find two parent in a row, we return true. If we find the whole tree without finding any parent, we then return false.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isCousins(self, root: Optional[TreeNode], x: int, y: int) -> bool:
        parent = set()
        q = collections.deque([root])
        level_node = 1
        while q:
            node = q.pop()
            level_node -= 1
            if node.left:
                if node.left.val in [x, y]:
                    parent.add(node)
                q.appendleft(node.left)
            if node.right:
                if node.right.val in [x, y]:
                    parent.add(node)
                q.appendleft(node.right)
            if level_node == 0:
                level_node = len(q)
                if len(parent) == 1:
                    return False
                if len(parent) == 2:
                    return True
        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`