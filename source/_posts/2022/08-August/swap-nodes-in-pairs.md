---
extends: _layouts.post
section: content
title: Swap nodes in pairs
problemUrl: https://leetcode.com/problems/swap-nodes-in-pairs/
date: 2022-08-27
categories: [linked-list]
---

We will create a dummy node, and set this as previous node, assing next pointer to head. Then from head, we take 2 nodes each time, swap their positions, then move the current and previous node until the end of the list. Then return the next pointer of the dummy node, which is our new head.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def swapPairs(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head:
            return head
        
        dummy = ListNode(-1, head)
        prev, cur = dummy, head
        
        while cur and cur.next:
            prev.next = cur.next
            cur.next = cur.next.next
            prev.next.next = cur
            prev, cur = cur, cur.next
            
        return dummy.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`