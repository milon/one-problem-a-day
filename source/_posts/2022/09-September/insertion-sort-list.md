---
extends: _layouts.post
section: content
title: Insertion sort list
problemUrl: https://leetcode.com/problems/insertion-sort-list/
date: 2022-09-01
categories: [linked-list]
---

We will create a dummy node and attach it at the beginning to make our life easier. Then we take 2 pointer, previous and current, previous will be our head and current will be the next node of previous. Then we move our current pointer to check if it is bigger than the current pointer, if yes, we move both our pointers to next position. If not, we start from the dummy, and check where this current actually belongs in the list, and insert it there. We will repeat the process until we reaches the end.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def insertionSortList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        dummy = ListNode(0, head)
        prev, cur = head, head.next
        while cur:
            if cur.val >= prev.val:
                prev, cur = cur, cur.next
                continue
            
            temp = dummy
            while cur.val > temp.next.val:
                temp = temp.next
            
            prev.next = cur.next
            cur.next = temp.next
            temp.next = cur
            cur = prev.next
        
        return dummy.next
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`