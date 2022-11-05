---
extends: _layouts.post
section: content
title: Merge in between linked lists
problemUrl: https://leetcode.com/problems/merge-in-between-linked-lists/
date: 2022-11-05
categories: [linked-list]
---

We will use two pointers to find the nodes before and after the merge, and then merge the two linked lists.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def mergeInBetween(self, list1: ListNode, a: int, b: int, list2: ListNode) -> ListNode:
        # Select correct node_a
        node_a = list1        
        for i in range(0, a - 1):
            node_a = node_a.next
            
        # Select correct node_b
        node_b = list1
        for i in range(0, b + 1):
            node_b = node_b.next
            
        # Select correct list2_tail
        list2_tail = list2
        while list2_tail.next:
            list2_tail = list2_tail.next
        
        # Link Node_a to list2_head, and list2_tail to Node_b
        node_a.next = list2
        list2_tail.next = node_b
        
        return list1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`