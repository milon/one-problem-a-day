---
extends: _layouts.post
section: content
title: Merge nodes in between zeros
problemUrl: https://leetcode.com/problems/merge-nodes-in-between-zeros/
date: 2022-09-06
categories: [linked-list]
---

We will create a dummy node for our result. Then we will start from the head, sum the values of the nodes until we reach another 0, then attach a node to our result list. We will repeat it until we reach the end of the list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def mergeNodes(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head and not head.next:
            return head
        
        curSum = 0
        res = ListNode(-1)
        pointer = res
        curr = head.next
        
        while curr:
            if curr.val != 0:
                curSum += curr.val
            else:
                pointer.next = ListNode(curSum)
                curSum = 0
                pointer = pointer.next
            curr = curr.next
        
        return res.next
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`