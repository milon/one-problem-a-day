---
extends: _layouts.post
section: content
title: Print binary tree
problemUrl: https://leetcode.com/problems/print-binary-tree/
date: 2022-09-07
categories: [tree]
---

First we will calculate the height of the tree. Our result will be a 2d matrix where the each row will have `2^height-1` element and there will be `height` rows in total. We initialize our result with empty string.

Then we recursivly print the entire tree to our result matrix using divide and conquar. Finally we return our result matrix.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def printTree(self, root: Optional[TreeNode]) -> List[List[str]]:
        def getHeight(root):
            if not root:
                return 0
            return 1 + max(getHeight(root.left), getHeight(root.right))
        
        height = getHeight(root)
        res = [["" for _ in range(2**height-1)] for _ in range(height)]

        def _print(root, l, r, i):
            if not root or l > r:
                return
            m = (l+r)//2
            res[i][m] = str(root.val)
            _print(root.left, l, m-1, i+1)
            _print(root.right, m+1, r, i+1)
            
        _print(root, 0, 2**height-1,0)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(log(n))`