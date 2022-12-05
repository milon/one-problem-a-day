---
extends: _layouts.post
section: content
title: Middle of the linked list
problemUrl: https://leetcode.com/problems/middle-of-the-linked-list/
date: 2022-12-05
categories: [linked-list]
---

We will take two pointers, one will move one step at a time and the other will move two steps at a time. When the second pointer reaches the end of the list, the first pointer will be at the middle of the list.

```python
class Solution:
    def middleNode(self, head: ListNode) -> ListNode:
        slow = fast = head
        while fast and fast.next:
            slow = slow.next
            fast = fast.next.next
        return slow
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
