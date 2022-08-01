---
extends: _layouts.post
section: content
title: Reorder list
problemUrl: https://leetcode.com/problems/reorder-list/
date: 2022-08-01
categories: [linked-list]
---

We will first find the middle of the list with a fast and slow pointer, fast pointer is twice as fast as the slow pointer. Then we will reverse the second half of the linked list. Finally, we merge both half. 

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def reorderList(self, head: Optional[ListNode]) -> None:
        # find middle
        fast, slow = head, head
        while fast and fast.next:
            fast = fast.next.next
            slow = slow.next
            
        # reverse second half
        second = slow.next
        slow.next = None
        prev = None
        while second:
            temp = second.next
            second.next = prev
            prev = second
            second = temp
            
        # merge two half
        first, second = head, prev
        while second:
            temp1, temp2 = first.next, second.next
            first.next = second
            second.next = temp1
            first, second = temp1, temp2
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`