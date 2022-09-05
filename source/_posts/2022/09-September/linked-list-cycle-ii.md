---
extends: _layouts.post
section: content
title: Linked list cycle II
problemUrl: https://leetcode.com/problems/linked-list-cycle-ii/
date: 2022-09-05
categories: [linked-list]
---

We can use Floyd's cycle detection algorithm to find the position. We will create a fast and slow pointer, fast pointer is twice as fast as the slow pointer. If the two pointer doesn't meet, that means there is no cycle, then we return a null node. If the match, we start another slow pointer from head and forward both slow pointer, when they will meet, that is the beginning of the cycle.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution:
    def detectCycle(self, head: Optional[ListNode]) -> Optional[ListNode]:
        slow, fast = head, head
        
        while fast and fast.next:
            slow = slow.next
            fast = fast.next.next
            if fast == slow:
                break
                
        if not fast or not fast.next:
            return None
        
        slow2 = head
        while slow != slow2:
            slow = slow.next
            slow2 = slow2.next
        
        return slow2
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`