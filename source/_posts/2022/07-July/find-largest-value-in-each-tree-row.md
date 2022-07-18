---
extends: _layouts.post
section: content
title: Find largest value in each tree row
problemUrl: https://leetcode.com/problems/find-largest-value-in-each-tree-row/
date: 2022-07-18
categories: [tree]
---

This is a classic BFS problem. We will traverse the tree with BFS and we will find the maximum value in each level. After each level is done, we will push the max value in our result array. After the traversal is done, we will return the result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def largestValues(self, root: Optional[TreeNode]) -> List[int]:
        if not root:
            return []
        res = []
        q = collections.deque([root])
        while q:
            count = len(q)
            maxLevel = float("-inf")
            for i in range(count):
                node = q.pop()
                maxLevel = max(maxLevel, node.val)
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
            res.append(maxLevel)
        return res
```

Time Complexity: O(n) <br/>
Space Complexity: O(n)