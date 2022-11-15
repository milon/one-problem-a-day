---
extends: _layouts.post
section: content
title: Maximum width of binary tree
problemUrl: https://leetcode.com/problems/maximum-width-of-binary-tree/
date: 2022-11-15
categories: [tree]
---

We will use BFS to find the maximum width of the tree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def widthOfBinaryTree(self, root: Optional[TreeNode]) -> int:
        queue = collections.deque([(root,0)])
        res = 0
        
        while queue:
            res = max(res, queue[-1][1]-queue[0][1]+1)
            for i in range(len(queue)):          
                node, cur = queue.popleft()
                if node.left:
                    queue.append((node.left, 2*cur))
                if node.right:
                    queue.append((node.right, 2*cur+1))
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`