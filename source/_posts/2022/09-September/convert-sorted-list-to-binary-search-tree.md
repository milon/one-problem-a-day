---
extends: _layouts.post
section: content
title: Convert sorted list to binary search tree
problemUrl: https://leetcode.com/problems/convert-sorted-list-to-binary-search-tree/
date: 2022-09-04
categories: [tree]
---

We will first loop over the entire linked list and add the values to a list. Now we will take the middle index of the list as our root and recursively build both the left and right subtree and return the tree as result.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def sortedListToBST(self, head: Optional[ListNode]) -> Optional[TreeNode]:
        values = []
        while head:
            values.append(head.val)
            head = head.next
            
        return self.buildTree(values)
        
    def buildTree(self, nums: List[int]) -> Optional[TreeNode]:
        if not nums:
            return None
        
        rootIdx = len(nums)//2
        left = self.buildTree(nums[:rootIdx])
        right = self.buildTree(nums[rootIdx+1:])
        
        return TreeNode(nums[rootIdx], left, right)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`