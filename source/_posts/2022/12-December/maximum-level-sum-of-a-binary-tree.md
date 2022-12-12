---
extends: _layouts.post
section: content
title: Maximum level sum of a binary tree
problemUrl: https://leetcode.com/problems/maximum-level-sum-of-a-binary-tree/
date: 2022-12-12
categories: [tree]
---

We will traverse the tree with BFS and we will keep on iterating over the nodes of the tree. We will keep on adding the nodes of the current level to a queue and we will keep on adding the values of the nodes of the current level to a variable. We will keep on doing this until we have visited all the nodes of the tree. At the end, we will return the maximum sum of the nodes of the tree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def maxLevelSum(self, root: Optional[TreeNode]) -> int:
        res = 0
        level, _max = 1, -math.inf
        q = collections.deque([root])
        while q:
            qLen = len(q)
            levelSum = 0
            for _ in range(qLen):
                node = q.pop()
                levelSum += node.val
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
            if levelSum > _max:
                _max = levelSum
                res = level
            level += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`