---
extends: _layouts.post
section: content
title: Sort list
problemUrl: https://leetcode.com/problems/sort-list/
date: 2022-09-05
categories: [linked-list]
---

We will use standard merge sort to sort the list, to get the middle node, we will use a fast and slow pointer approach, rest is standard merge sort stuffs.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def sortList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        return self.mergeSort(head)
        
    def getMidNode(self, head: Optional[ListNode]) -> Optional[ListNode]:
        fast, slow = head, head
        prevSlow = None
        while fast and fast.next:
            prevSlow = slow
            slow = slow.next
            fast = fast.next.next
        prevSlow.next = None
        
        return slow
    
    def merge(self, left: Optional[ListNode], right: Optional[ListNode]) -> Optional[ListNode]:
        dummy = ListNode(-1)
        cur = dummy
        while left and right:
            if left.val <= right.val:
                cur.next = left
                left = left.next
            else:
                cur.next = right
                right = right.next
            cur = cur.next
        
        if left: cur.next = left
        if right: cur.next = right
        
        return dummy.next
    
    def mergeSort(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head or not head.next:
            return head
        
        midNode = self.getMidNode(head)
        left = self.mergeSort(head)
        right = self.mergeSort(midNode)
        
        return self.merge(left, right)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(nlog(n))`