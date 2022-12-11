---
extends: _layouts.post
section: content
title: Remove nodes from linked list
problemUrl: https://leetcode.com/problems/remove-nodes-from-linked-list/
date: 2022-12-11
categories: [linked-list]
---

We will use recursion to remove the nodes from the linked list. If the current node is not a leaf node, we will check if the next node is a leaf node. If it is, we will remove the next node. If it is not, we will call the function recursively on the next node. If the current node is a leaf node, we will return the current node.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def removeNodes(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head:
            return head
        
        head.next = self.removeNodes(head.next)
        if head.next and head.val < head.next.val:
            return head.next
        
        return head
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`