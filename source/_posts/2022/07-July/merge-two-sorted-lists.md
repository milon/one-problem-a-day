---
extends: _layouts.post
section: content
title: Merge two sorted list
problemUrl: https://leetcode.com/problems/merge-two-sorted-list/
date: 2022-07-15
categories: [linked-list]
---

This approach is very much like merge sort. We took 2 pointers for 2 list, compare thier values, and assign the smaller one to our new list. Then we move that pointer to next node. We go through the process until one list is empty. Then we attach the other list to the result.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def mergeTwoLists(self, list1: Optional[ListNode], list2: Optional[ListNode]) -> Optional[ListNode]:
        head = ListNode(-1)
        current = head
        while list1 and list2:
            if list1.val < list2.val:
                current.next = list1
                list1 = list1.next
            else:
                current.next = list2
                list2 = list2.next
            current = current.next
        
        if list1: current.next = list1
        if list2: current.next = list2
        return head.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`