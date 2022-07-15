---
extends: _layouts.post
section: content
title: Reverse linked list
problemUrl: https://leetcode.com/problems/reverse-linked-list/
date: 2022-07-15
categories: [linked-list]
---

We start with a null node called previous, iterate through the list, and move it's next printer previous on and then repeat it till the end. Then we just return the previous which is not the current head of the list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def reverseList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        prev = None
        current = head
        while current:
            next = current.next
            current.next = prev
            prev = current
            current = next
        return prev
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`