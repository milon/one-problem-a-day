---
extends: _layouts.post
section: content
title: Maximum binary tree
problemUrl: https://leetcode.com/problems/maximum-binary-tree/
date: 2022-09-10
categories: [tree]
---

We will recursively create our tree, we will take the largest number of the array and put it as root. Then we will create the left subtree with the left elements from the input of the root, and right subtree with the right elements. Finally we will return our root.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def constructMaximumBinaryTree(self, nums: List[int]) -> Optional[TreeNode]:
        if not nums:
            return None
        
        idx = nums.index(max(nums))
        
        root = TreeNode(nums[idx])
        root.left = self.constructMaximumBinaryTree(nums[:idx])
        root.right = self.constructMaximumBinaryTree(nums[idx+1:])
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`