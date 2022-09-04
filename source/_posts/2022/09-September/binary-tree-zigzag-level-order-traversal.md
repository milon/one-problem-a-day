---
extends: _layouts.post
section: content
title: Binary tree zigzag level order traversal
problemUrl: https://leetcode.com/problems/binary-tree-zigzag-level-order-traversal/
date: 2022-09-04
categories: [tree]
---

We will traverse the tree with BFS and append the values of each level to our result list. And for each alternative level we change the order. Finally return the result after we visit each node.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def zigzagLevelOrder(self, root: Optional[TreeNode]) -> List[List[int]]:
        if not root:
            return []
        
        res = []
        q = collections.deque([root])
        reverse = False
        while q:
            qLen = len(q)
            level = []
            for _ in range(qLen):
                node = q.pop()
                level.append(node.val)
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
            res.append(reversed(level) if reverse else level)
            reverse = not reverse
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`