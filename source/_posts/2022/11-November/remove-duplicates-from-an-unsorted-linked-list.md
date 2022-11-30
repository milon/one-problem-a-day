---
extends: _layouts.post
section: content
title: Remove duplicates from an unsorted linked list
problemUrl: https://leetcode.com/problems/remove-duplicates-from-an-unsorted-linked-list/
date: 2022-11-30
categories: [linked-list]
---

We will use a hashmap to count the frequency of each node in the linked list. Then we will traverse the linked list again and remove the nodes that have frequency greater than 1.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def deleteDuplicatesUnsorted(self, head: ListNode) -> ListNode:
        count = collections.defaultdict(int)
        cur = head
        while cur:
            count[cur.val] += 1
            cur = cur.next
        
        dummy = ListNode(0, head)
        prev = dummy
        while head:
            if count[head.val] > 1:
                prev.next = head.next
            else:
                prev = prev.next
            
            head = head.next
        
        return dummy.next
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
