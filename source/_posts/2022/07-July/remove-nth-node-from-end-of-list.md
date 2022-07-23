---
extends: _layouts.post
section: content
title: Remove nth node from end of list
problemUrl: https://leetcode.com/problems/remove-nth-node-from-end-of-list/
date: 2022-07-23
categories: [linked-list]
---

We will have 2 pointer, first we move the right pointer to nth node. Then we move both left and right pointer until the right pointer moves to the end of the list, that means left pointer is now on nth node from the end. Then we remove the node and return the head.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def removeNthFromEnd(self, head: Optional[ListNode], n: int) -> Optional[ListNode]:
        dummy = ListNode(-1, head)
        left = dummy
        right = head
        
        while n > 0:
            right = right.next
            n -= 1
        
        while right:
            right = right.next
            left = left.next
        
        left.next = left.next.next
        return dummy.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`