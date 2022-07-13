---
extends: _layouts.post
section: content
title: Binary tree level order traversal
date: 2022-07-13
categories: [tree]
---

Problem URL: [Binary tree level order traversal](https://leetcode.com/problems/binary-tree-level-order-traversal/)

This is a classing BFS problem. We should traverse the whole tree with BFS, and store the values level by level to a list. Then combine each level to a list and return.

```python
import collections
from typing import List, Optional

# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def levelOrder(self, root: Optional[TreeNode]) -> List[List[int]]:
        if not root:
            return []
        res = []
        q = collections.deque()
        q.appendleft(root)
        while q:
            curLevelCount = len(q)
            currentLevelVal = []
            for i in range(curLevelCount):
                current = q.pop()
                currentLevelVal.append(current.val)
                if current.left:
                    q.appendleft(current.left)
                if current.right:
                    q.appendleft(current.right)
            res.append(currentLevelVal)
        return res
```

This is very efficient. Both the time and space complexity of this problem is `O(n)`.