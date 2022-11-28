---
extends: _layouts.post
section: content
title: Remove zero sum consecutive nodes from linked list
problemUrl: https://leetcode.com/problems/remove-zero-sum-consecutive-nodes-from-linked-list/
date: 2022-11-28
categories: [linked-list]
---

We will keep track of the prefix sum of the linked list. If the prefix sum is repeated, we will remove the nodes between the repeated prefix sum and the current prefix sum.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def removeZeroSumSublists(self, head: Optional[ListNode]) -> Optional[ListNode]:
        dummy = ListNode(0, head)
        prefix = 0
        
        lookup = {0:dummy}
        while head:
            prefix += head.val
            lookup[prefix] = head
            head = head.next
        
        head = dummy
        prefix = 0
        while head:
            prefix += head.val
            head.next = lookup[prefix].next
            head = head.next
        
        return dummy.next
```

Time complexity: `O(n)`, n is the number of nodes in the linked list <br/>
Space complexity: `O(n)`