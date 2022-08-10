---
extends: _layouts.post
section: content
title: Convert sorted array to binary search tree
problemUrl: https://leetcode.com/problems/convert-sorted-array-to-binary-search-tree/
date: 2022-08-10
categories: [tree]
---

If there is no element in the sorted list, then we return null. This logic we will use as our base case. Then we will select the middle of the sorted list as our root node. Then from there, all the elements if the left will go to our left subtree and all the elements to the right will go to our right subtree. Finally we will return our root.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def sortedArrayToBST(self, nums: List[int]) -> Optional[TreeNode]:
        if not nums:
            return None
        rootIdx = len(nums)//2;
        root = TreeNode(nums[rootIdx])
        root.left = self.sortedArrayToBST(nums[:rootIdx])
        root.right = self.sortedArrayToBST(nums[rootIdx+1:])
        return root
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`