---
extends: _layouts.post
section: content
title: Intersection of two linked lists
problemUrl: https://leetcode.com/problems/intersection-of-two-linked-lists/
date: 2022-10-01
categories: [linked-list]
---

We start from both list together, and if we can't find a match, we change the position of the both list, and continue until we find a match and return that.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution:
    def getIntersectionNode(self, headA: ListNode, headB: ListNode) -> Optional[ListNode]:
        l1, l2 = headA, headB
        while l1 != l2:
            l1 = l1.next if l1 else headB
            l2 = l2.next if l2 else headA
        return l1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`


