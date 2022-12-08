---
extends: _layouts.post
section: content
title: Insert into a sorted circular linked list
problemUrl: https://leetcode.com/problems/insert-into-a-sorted-circular-linked-list/
date: 2022-12-08
categories: [linked-list]
---

We will use a `prev` pointer to store the previous node. If the current node is greater than the previous node and less than the next node, then we will insert the node between the previous node and the current node. If the current node is less than the previous node, then we will insert the node between the previous node and the next node. If the current node is greater than the previous node and greater than the next node, then we will continue to traverse the linked list.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val=None, next=None):
        self.val = val
        self.next = next
"""

class Solution:
    def insert(self, head: 'Optional[Node]', insertVal: int) -> 'Node':
        node = Node(insertVal)

        if not head:
            node.next = node
            return node
        
        prev, curr = head, head.next
        while prev.next != head:
            # Case1: 1 <- Node(2) <- 3
            if prev.val <= node.val <= curr.val:
                break
            
            # Case2: 3 -> 1, 3 -> Node(4) -> 1, 3 -> Node(0) -> 1
            if prev.val > curr.val and (node.val > prev.val or node.val < curr.val):
                break
            
            prev, curr = prev.next, curr.next
        
        # Insert node
        node.next = curr
        prev.next = node 

        return head
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`