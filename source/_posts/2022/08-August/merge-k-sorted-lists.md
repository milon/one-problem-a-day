---
extends: _layouts.post
section: content
title: Merge k sorted lists
problemUrl: https://leetcode.com/problems/merge-k-sorted-lists/
date: 2022-08-06
categories: [linked-list]
---

We can merge 2 sorted list with `O(n)` time complexity. Now we can go through the lists, and merge it one by one, this will be a `O(n^2)` operation. But if we merge every 2 list at a time and then continue the process until there is only one list left in the lists, then we can potentially reduce the complexity of merging from `O(n)` to `O(log(n))` time.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def mergeKLists(self, lists: List[Optional[ListNode]]) -> Optional[ListNode]:
        if not lists or len(lists) == 0:
            return None
        while len(lists) > 1:
            mergedList = []
            for i in range(0, len(lists), 2):
                l1 = lists[i]
                l2 = lists[i+1] if (i+1) < len(lists) else None
                mergedList.append(self.mergeList(l1, l2))
            lists = mergedList
        return lists[0]
        
    
    def mergeList(self, l1, l2):
        dummy = ListNode()
        current = dummy
        
        while l1 and l2:
            if l1.val < l2.val:
                current.next = l1
                l1 = l1.next
            else:
                current.next = l2
                l2 = l2.next
            current = current.next
        
        if l1: current.next = l1
        if l2: current.next = l2
        
        return dummy.next
```

Time Complexity: `O(n*log(k))`, n is the number of elements in all lists, k is the size of the list. <br/>
Space Complexity: `O(n)`, n is the number of elements in all lists