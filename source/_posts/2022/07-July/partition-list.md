---
extends: _layouts.post
section: content
title: Partition list
problemUrl: https://leetcode.com/problems/partition-list/
date: 2022-07-22
categories: [linked-list]
---

We will have 2 separate linked list, left and right. All the values that is less than target will go to the left list, all the values that is greater than or equal to target will go to the right list. Finally we will merge both and return.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def partition(self, head: Optional[ListNode], x: int) -> Optional[ListNode]:
        left = leftHead = ListNode(None)
        right = rightHead = ListNode(None)
        
        while head:
            if head.val < x:
                left.next = head
                left = left.next
            else:
                right.next = head
                right = right.next
            head = head.next
        
        right.next = None
        left.next = rightHead.next
        return leftHead.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`