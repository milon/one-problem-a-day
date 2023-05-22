---
extends: _layouts.post
section: content
title: Split a circular linked list
problemUrl: https://leetcode.com/problems/split-a-circular-linked-list/
date: 2023-05-22
categories: [linked-list]
---

We can use a slow and fast pointer to find the middle of the linked list. Then, we can set the next pointer of the last node to `None` to split the linked list into two. We can then return the head of the second linked list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def splitCircularLinkedList(self, head: Optional[ListNode]) -> List[Optional[ListNode]]:
        slow, fast = head, head.next
        while fast.next != head:
            slow = slow.next
            
            if fast.next.next != head: 
                fast = fast.next.next
            else: 
                fast = fast.next
        
        next_list = slow.next
        slow.next = head
        fast.next = next_list
        return [head, next_list]
```

Time complexity: `O(n)` where n is the number of nodes in the linked list.
Space complexity: `O(1)`