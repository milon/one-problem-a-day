---
extends: _layouts.post
section: content
title: Count good nodes in binary tree
problemUrl: https://leetcode.com/problems/count-good-nodes-in-binary-tree/
date: 2022-07-26
categories: [tree]
---

We will traverse the tree with DFS and in the process we check if the value of the node is greater than or equals to it's child nodes. If wes, then we count it. After the traverse is done, we return the count.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def goodNodes(self, root: TreeNode) -> int:
        def dfs(root, maxVal):
            if not root:
                return 0
            
            res = 1 if root.val >= maxVal else 0
            maxVal = max(maxVal, root.val)
            res += dfs(root.left, maxVal)
            res += dfs(root.right, maxVal)
            
            return res
        
        return dfs(root, root.val)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`