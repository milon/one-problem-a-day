---
extends: _layouts.post
section: content
title: Same tree
problemUrl: https://leetcode.com/problems/same-tree/
date: 2022-07-14
categories: [tree]
---

We can traverse through the whole tree and compare each value. We are doing it with DFS for this solution.

```python
from typing import Optional

# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def isSameTree(self, p: Optional[TreeNode], q: Optional[TreeNode]) -> bool:
        if not p and not q: 
            return True
        if p and q and p.val == q.val:
            return self.isSameTree(p.left, q.left) and self.isSameTree(p.right, q.right)
        else:
            return False
```

We are traversing the thee once, so time complexity is `O(n)`. The call stack of the recursion can also store the whole tree in worst case scenerio, so the space complexity will also be `O(n)`.