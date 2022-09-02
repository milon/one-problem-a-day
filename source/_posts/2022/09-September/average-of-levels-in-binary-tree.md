---
extends: _layouts.post
section: content
title: Average of levels in binary tree
problemUrl: https://leetcode.com/problems/average-of-levels-in-binary-tree/
date: 2022-09-02
categories: [tree]
---

We will run BFS and after traversal of each level, we append the average in our result, and finally return it after the end of traversal.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def averageOfLevels(self, root: Optional[TreeNode]) -> List[float]:
        q = collections.deque([root])
        res = []
        while q:
            level = []
            qLen = len(q)
            for i in range(qLen):
                node = q.pop()
                level.append(node.val)
                
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
            res.append(mean(level))
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
