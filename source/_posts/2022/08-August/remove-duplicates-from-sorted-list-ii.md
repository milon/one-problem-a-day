---
extends: _layouts.post
section: content
title: Remove duplicates from sorted list II
problemUrl: https://leetcode.com/problems/remove-duplicates-from-sorted-list-ii/
date: 2022-08-30
categories: [linked-list]
---

We will have 2 pointers, when we iterate over each node, we check if we found duplicate, then we move right pointer until we hit another value. Then remove all nodes between 2 pointers and move both pointers.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def deleteDuplicates(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head or not head.next:
            return head
        
        dummy = ListNode(-1, head)
        prev = dummy
        
        while head:
            while head.next and head.next.val == head.val:
                head = head.next
            if prev.next == head:
                prev = head
            else:
                prev.next = head.next
            head = head.next
        
        return dummy.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`