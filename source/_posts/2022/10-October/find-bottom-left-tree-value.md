---
extends: _layouts.post
section: content
title: Find bottom left tree value
problemUrl: https://leetcode.com/problems/find-bottom-left-tree-value/
date: 2022-10-09
categories: [tree]
---

We will traverse the tree with BFS and assign the first node of the each level in our result. At the end of the traversal, we will return the result, which will store the left most value of the last level of the tree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findBottomLeftValue(self, root: Optional[TreeNode]) -> int:
        res = None
        q = collections.deque([root])
        
        while q:
            qLen = len(q)
            for i in range(qLen):
                node = q.pop()
                if i == 0:
                    res = node.val
                if node.left: q.appendleft(node.left)
                if node.right: q.appendleft(node.right)
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`