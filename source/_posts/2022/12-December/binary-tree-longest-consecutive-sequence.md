---
extends: _layouts.post
section: content
title: Binary tree longest consecutive sequence
problemUrl: https://leetcode.com/problems/binary-tree-longest-consecutive-sequence/
date: 2022-12-19
categories: [tree]
---

We will use a recursive function to find the longest consecutive sequence in the left subtree and the right subtree. Then we will compare the longest consecutive sequence in the left subtree and the right subtree with the current node. If the current node is consecutive to the left subtree, then we will update the longest consecutive sequence. If the current node is consecutive to the right subtree, then we will update the longest consecutive sequence. Finally, we will return the longest consecutive sequence.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def longestConsecutive(self, root: Optional[TreeNode]) -> int:
        def dfs(node: Optional[TreeNode], expected_val: int, length: int = 0) -> int:
            if not node:
                return 0
            
            if node.val == expected_val:
                length += 1
            else:
                length = 1
            
            return max(
                length,
                dfs(node.left, node.val+1, length),
                dfs(node.right, node.val+1, length)
            )
        
        return dfs(root, root.val)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`