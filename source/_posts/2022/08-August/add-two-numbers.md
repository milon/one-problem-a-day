---
extends: _layouts.post
section: content
title: Add two numbers
problemUrl: https://leetcode.com/problems/add-two-numbers/
date: 2022-08-01
categories: [linked-list]
---

We will add first node from both list, and add it to a new list. We will also keep a carry if the number if greater than 9. We will run it until all of l1, l2 and carry is null and return the head of the new list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def addTwoNumbers(self, l1: Optional[ListNode], l2: Optional[ListNode]) -> Optional[ListNode]:
        dummy = ListNode()
        cur = dummy
        
        carry = 0
        while l1 or l2 or carry:
            v1 = l1.val if l1 else 0
            v2 = l2.val if l2 else 0
            
            # new digit
            val = v1 + v2 + carry
            carry = val // 10
            val = val % 10
            cur.next = ListNode(val)
            
            # update
            cur = cur.next
            l1 = l1.next if l1 else None
            l2 = l2.next if l2 else None
        
        return dummy.next
```

Time Complexity: `O(n)`, n is the largest list's length. <br/>
Space Complexity: `O(1)`