---
extends: _layouts.post
section: content
title: Remove linked list elements
problemUrl: https://leetcode.com/problems/remove-linked-list-elements/
date: 2022-09-09
categories: [linked-list]
---

We will create a dummy node and attach it before our head. Then we will iterate over each node, if the value of the node is equal to our node, we will remove them. Then we will return the next node of our dummy node as result.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def removeElements(self, head: Optional[ListNode], val: int) -> Optional[ListNode]:
        if not head:
            return head
        
        dummy = ListNode(-1, head)
        prev, cur = dummy, head
        while cur:
            if cur.val == val:
                prev.next = cur.next
            else:
                prev = cur
            cur = cur.next
        
        return dummy.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`