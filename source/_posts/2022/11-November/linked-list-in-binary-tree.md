---
extends: _layouts.post
section: content
title: Linked list in binary tree
problemUrl: https://leetcode.com/problems/linked-list-in-binary-tree/
date: 2022-11-21
categories: [linked-list, tree]
---

We will traverse the tree using DFS and check if the linked list is present in the tree or not. If the linked list is present in the tree, then we will return `True`. Otherwise, we will return `False`.

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
    def isSubPath(self, head: Optional[ListNode], root: Optional[TreeNode]) -> bool:
        def dfs(head: Optional[ListNode], root: Optional[TreeNode]) -> bool:
            if not head:
                return True
            if not root:
                return False
            if root.val == head.val:
                return dfs(head.next, root.left) or dfs(head.next, root.right)
            return False
        
        if not head: 
            return True
        if not root: 
            return False
        
        return dfs(head, root) or self.isSubPath(head, root.left) or self.isSubPath(head, root.right)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`