---
extends: _layouts.post
section: content
title: Path sum II
problemUrl: https://leetcode.com/problems/path-sum-ii/
date: 2022-09-05
categories: [backtracking]
---

We will use DFS along with backtracking to get the paths of every root to leaf path that adds upto the target.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def pathSum(self, root: Optional[TreeNode], targetSum: int) -> List[List[int]]:
        paths = []

        def dfs(node: Optional[TreeNode], path: List[int], resSum: int):
            if not node:
                return

            path.append(node.val);
            resSum -= node.val;

            if not node.left and not node.right and resSum == 0:
                paths.append(path.copy())
            else:
                dfs(node.left, path, resSum)
                dfs(node.right, path, resSum)
            path.pop()

        dfs(root, [], targetSum)
        return paths
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`, for recursive call stack