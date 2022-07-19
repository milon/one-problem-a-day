---
extends: _layouts.post
section: content
title: Linked list cycle
problemUrl: https://leetcode.com/problems/linked-list-cycle/
date: 2022-07-19
categories: [linked-list]
---

We will take two pointer, fast and slow. Fast goes twice as fast as slow. Then we run both pointers at the same time, if there is a cycle, then this two pointers will meet, else we will goes to the last pointer and return false.

```python
from typing import Optional

# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution:
    def hasCycle(self, head: Optional[ListNode]) -> bool:
        slow, fast = head, head
        while fast and fast.next:
            slow = slow.next
            fast = fast.next.next
            if slow == fast:
                return True
        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`