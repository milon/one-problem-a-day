---
extends: _layouts.post
section: content
title: Sum root to leaf numbers
problemUrl: https://leetcode.com/problems/sum-root-to-leaf-numbers/
date: 2022-09-02
categories: [tree]
---

We will run DFS from root to leaf, along in the way, we calculate the number for root to leaf value. Once we reach the leaf, we add it to our result. Finally we return the result after traversal is over.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def sumNumbers(self, root: Optional[TreeNode]) -> int:
        def dfs(root, curSum):
            if not root:
                return
            
            curSum = curSum*10 + root.val
            if not root.left and not root.right:
                self.res += curSum
                return
            dfs(root.left, curSum)
            dfs(root.right, curSum)
        
        self.res = 0
        dfs(root, 0)
        
        return self.res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`