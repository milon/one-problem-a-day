---
extends: _layouts.post
section: content
title: Vertical order traversal of a binary tree
problemUrl: https://leetcode.com/problems/vertical-order-traversal-of-a-binary-tree/
date: 2022-09-04
categories: [tree]
---

We will first traverse the tree with DFS and store it's values along with row and column in the the process. Then we sort them by column value and group them by column value. Finally, take all these groups, combine it to a list and return the values.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def verticalTraversal(self, root: Optional[TreeNode]) -> List[List[int]]:
        values = []
        
        def dfs(root, row, col):
            if not root:
                return
            values.append((row, col, root.val))
            dfs(root.left, row+1, col-1)
            dfs(root.right, row+1, col+1)
        
        dfs(root, 0, 0)
        
        values = sorted(values, key=lambda x:(x[1], x[0], x[2]))
        
        lookup = collections.defaultdict(list)
        for row, col, value in values:
            lookup[col].append(value)
        
        return lookup.values()
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`