---
extends: _layouts.post
section: content
title: Reverse linked list II
problemUrl: https://leetcode.com/problems/reverse-linked-list-ii/
date: 2022-10-07
categories: [linked-list]
---

First if the left and right position of the list is same, we can just return the list. Otherwise, we will take a pointer, traverse till the left position, then reverse the list in place till the right position. Once the reversal of the list is done, we will return the head of the list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def reverseBetween(self, head: Optional[ListNode], left: int, right: int) -> Optional[ListNode]:
        if left == right:
            return head
        
        p = dummy = ListNode(0)
        dummy.next = head
        for _ in range(left - 1):
            p = p.next
        
        cur = p.next
        pre = None
        for _ in range(right - left + 1):
            cur.next, pre, cur = pre, cur, cur.next
        
        p.next.next = cur
        p.next = pre
        
        return dummy.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`