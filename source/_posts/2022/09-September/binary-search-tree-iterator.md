---
extends: _layouts.post
section: content
title: Binary search tree iterator
problemUrl: https://leetcode.com/problems/binary-search-tree-iterator/
date: 2022-09-04
categories: [tree]
---

We will create a queue to store our values while create the oterator class. Then for next, we will pop the values from the queue and return, for hasNext, we will check it the queue is empty or not.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class BSTIterator:
    def __init__(self, root: Optional[TreeNode]):
        self.q = collections.deque()
        self._traverse(root)

    def next(self) -> int:
        if self.q:
            return self.q.pop()

    def hasNext(self) -> bool:
        return bool(self.q)
        
    def _traverse(self, root):
        if not root:
            return
        self._traverse(root.left)
        self.q.appendleft(root.val)
        self._traverse(root.right)

# Your BSTIterator object will be instantiated and called as such:
# obj = BSTIterator(root)
# param_1 = obj.next()
# param_2 = obj.hasNext()
```

Time Complexity: `O(n)` for the init, `O(1)` for others <br/>
Space Complexity: `O(n)`