---
extends: _layouts.post
section: content
title: Check completeness of a binary tree
problemUrl: https://leetcode.com/problems/check-completeness-of-a-binary-tree/
date: 2022-11-06
categories: [tree]
---

We will use BFS for level order traversal. We will add children to the BFS queue, if it's a complete tree, we should not have any node once we encounter a null node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isCompleteTree(self, root: Optional[TreeNode]) -> bool:
        q = collections.deque([root])
        while q:
            node = q.pop()
            if not node:
                break
            q.appendleft(node.left)
            q.appendleft(node.right)
        return not any(q)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`