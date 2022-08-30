---
extends: _layouts.post
section: content
title: Remove duplicates from sorted list
problemUrl: https://leetcode.com/problems/remove-duplicates-from-sorted-list/
date: 2022-08-30
categories: [linked-list]
---

We will check the current value to the next node value, if they are equal, we remove the current one, and move on till the end of the list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def deleteDuplicates(self, head: Optional[ListNode]) -> Optional[ListNode]:
        cur = head
        while cur and cur.next:
            if cur.val == cur.next.val:
                cur.next = cur.next.next
            else:
                cur = cur.next
        return head
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`