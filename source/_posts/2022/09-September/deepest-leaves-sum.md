---
extends: _layouts.post
section: content
title: Deepest leaves sum
problemUrl: https://leetcode.com/problems/deepest-leaves-sum/
date: 2022-09-17
categories: [tree]
---

We will run a BFS to get the sum of each level, then return the last level sum as result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def deepestLeavesSum(self, root: Optional[TreeNode]) -> int:
        q = collections.deque([root])
        while q:
            qLen = len(q)
            levelSum = 0
            for _ in range(qLen):
                node = q.pop()
                levelSum += node.val
                
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
        
        return levelSum
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`