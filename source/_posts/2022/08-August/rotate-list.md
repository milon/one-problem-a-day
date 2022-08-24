---
extends: _layouts.post
section: content
title: Rotate list
problemUrl: https://leetcode.com/problems/rotate-list/
date: 2022-08-24
categories: [linked-list]
---

We will first iterate over the list to count the number of the nodes. Then took k and mod it with the count for mitigate overflow. Then we took 2 pointer, first one we iterate k times and then start both pointers until first pointer reaches the end. Then connect the first pointer's next to head, then make head the second pointer. Finally make second pointer's next to null and return the new head.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def rotateRight(self, head: Optional[ListNode], k: int) -> Optional[ListNode]:
        if not head:
            return head
        
        length = 0
        cur = head
        while cur:
            cur = cur.next
            length += 1
        
        k = k % length
        first = head
        while k:
            first = first.next
            k -= 1
        
        second = head
        while first.next:
            first = first.next
            second = second.next
            
        first.next = head
        head = second.next
        second.next = None
        
        return head
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`