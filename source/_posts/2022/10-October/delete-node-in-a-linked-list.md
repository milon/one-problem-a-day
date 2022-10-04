---
extends: _layouts.post
section: content
title: Delete node in a linked list
problemUrl: https://leetcode.com/problems/delete-node-in-a-linked-list/
date: 2022-10-04
categories: [linked-list]
---

As we are not given with head node, we will copy the value of next node to the current node. Then we remove the next node by moving the next pointer of current node to the next pointer of the next node.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution:
    def deleteNode(self, node):
        node.val = node.next.val
        node.next = node.next.next
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`
