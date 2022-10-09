---
extends: _layouts.post
section: content
title: Two sum IV input is a bst
problemUrl: https://leetcode.com/problems/two-sum-iv-input-is-a-bst/
date: 2022-10-09
categories: [tree]
---

This is very similar to two sum problem. But rather than traversing an array, we will traverse a tree. We will be using DFS to traverse the tree and along with the way, we will store the difference between the target and current node value into a lookup hashset. When we find a match, we will return true otherwise return false.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def findTarget(self, root: Optional[TreeNode], k: int) -> bool:
        lookup = set()
        
        def _findTarget(root):
            if not root:
                return False
            if root.val in lookup:
                return True
            
            lookup.add(k-root.val)
            return _findTarget(root.left) or _findTarget(root.right)
        
        return _findTarget(root)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
