---
extends: _layouts.post
section: content
title: Kth smallest element in a bst
problemUrl: https://leetcode.com/problems/kth-smallest-element-in-a-bst/
date: 2022-08-06
categories: [tree]
---

If we traverse the binary search tree in inorder, then we will actually get the sorted array. Then we can easily pick the kth element by picking k-1 indexed value from the array, as it's mentioned, k is 1-indexed.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def kthSmallest(self, root: Optional[TreeNode], k: int) -> int:
        def dfs(root):
            if not root:
                return []
            return [*dfs(root.left), root.val, *dfs(root.right)]
        
        sortedArray = dfs(root)
        return sortedArray[k-1]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`