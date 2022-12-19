---
extends: _layouts.post
section: content
title: Delete n nodes after m nodes of a linked list
problemUrl: https://leetcode.com/problems/delete-n-nodes-after-m-nodes-of-a-linked-list/
date: 2022-12-19
categories: [linked-list]
---

We will create a dummy node and attach the head node to it. Then we will do the following:

- Use an indicator i to count the number of already-passed list nodes
- Keep moving head node forward as long as i < m-1
- Remove the next n nodes and reset i to 0 when i == m-1

```python
class Solution:
    def deleteNodes(self, head: ListNode, m: int, n: int) -> ListNode:
        dummy = ListNode(0, head)
        i = 0
        while head:
            if i < m-1:
                i += 1
            elif i == m-1:
                for _ in range(n):
                    if head.next:
                        head.next = head.next.next
                i = 0
            head = head.next
        return dummy.next
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`