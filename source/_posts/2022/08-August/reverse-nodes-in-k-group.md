---
extends: _layouts.post
section: content
title: Reverse nodes in k group
problemUrl: https://leetcode.com/problems/reverse-nodes-in-k-group/
date: 2022-08-06
categories: [linked-list]
---

We will create a helper funtion to get the kths item of the list. Then as we go through the whole list, we will take kth item, reverse it in place and move forward till the end of the ;list.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def reverseKGroup(self, head: ListNode, k: int) -> ListNode:
        dummy = ListNode(0, head)
        groupPrev = dummy

        while True:
            kth = self.getKth(groupPrev, k)
            if not kth:
                break
            groupNext = kth.next

            # reverse group
            prev, curr = kth.next, groupPrev.next
            while curr != groupNext:
                tmp = curr.next
                curr.next = prev
                prev = curr
                curr = tmp

            tmp = groupPrev.next
            groupPrev.next = kth
            groupPrev = tmp
            
        return dummy.next

    def getKth(self, curr, k):
        while curr and k > 0:
            curr = curr.next
            k -= 1
        return curr
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`