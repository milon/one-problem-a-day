---
extends: _layouts.post
section: content
title: Delete the middle node of a linked list
problemUrl: https://leetcode.com/problems/delete-the-middle-node-of-a-linked-list/
date: 2022-10-14
categories: [linked-list]
---

We will take a two pointer approach to find the middle node, and then we will delete the middle node. The first pointer will move one step at a time, and the second pointer will move two steps at a time. When the second pointer reaches the end of the linked list, the first pointer will be at the middle node. We will delete the middle node by setting the `next` pointer of the previous node to the `next` pointer of the middle node.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def deleteMiddle(self, head: Optional[ListNode]) -> Optional[ListNode]:
        dummy = slow = fast = ListNode()
        dummy.next = head
        while fast.next and fast.next.next:
            slow = slow.next
            fast = fast.next.next
        slow.next = slow.next.next    
        return dummy.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`