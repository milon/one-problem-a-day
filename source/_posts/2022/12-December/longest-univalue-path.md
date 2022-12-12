---
extends: _layouts.post
section: content
title: Longest univalue path
problemUrl: https://leetcode.com/problems/longest-univalue-path/
date: 2022-12-12
categories: [tree]
---

This problem is very similar to diameter of the tree problem. We will keep on iterating over the nodes of the tree and we will check whether the current node is the root of the longest univalue path. If it is, we will update the longest univalue path to be the maximum of the longest univalue path and the sum of the left and right univalue paths. We will keep on doing this until we have visited all the nodes of the tree. At the end, we will return the longest univalue path.

```python
class Solution:
    def longestUnivaluePath(self, root: TreeNode) -> int:
        self.longest = 0
        
        def dfs(node):
            if not node: return 0
            left = dfs(node.left)
            right = dfs(node.right)
            left = left + 1 if node.left and node.left.val == node.val else 0
            right = right + 1 if node.right and node.right.val == node.val else 0
            self.longest = max(self.longest, left + right)
            return max(left, right)
        
        dfs(root)
        return self.longest
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`