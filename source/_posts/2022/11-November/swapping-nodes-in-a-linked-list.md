---
extends: _layouts.post
section: content
title: Swapping nodes in a linked list
problemUrl: https://leetcode.com/problems/swapping-nodes-in-a-linked-list/
date: 2022-11-25
categories: [linked-list]
---

We will iterate over the whole list to find the length of the list. Then we get the kth node as the first node and the (length-k+1)th node as the second node. We will swap the values of the two nodes.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def swapNodes(self, head: Optional[ListNode], k: int) -> Optional[ListNode]:
        frontNode = endNode = head
        
        node = head
        length = 0
        while node:
            length += 1
            if length == k:
                frontNode = node
            node = node.next
            
        endK = length - k
        for _ in range(endK):
            endNode = endNode.next
        
        frontNode.val, endNode.val = endNode.val, frontNode.val
        return head
```

Time complexity: `O(n)`, n is the length of the linked list <br/>
Space complexity: `O(1)`