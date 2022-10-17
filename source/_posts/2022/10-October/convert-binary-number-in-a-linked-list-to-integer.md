---
extends: _layouts.post
section: content
title: Convert binary number in a linked list to integer
problemUrl: https://leetcode.com/problems/convert-binary-number-in-a-linked-list-to-integer/
date: 2022-10-16
categories: [linked-list]
---

We will use a variable `res` to store the result. We will iterate over the linked list, and for each node, we will shift `res` to the left by 1 bit, and add the value of the current node to `res`. Finally, we will return `res`.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def getDecimalValue(self, head: ListNode) -> int:
        res = 0
        while head:
            res = 2*res + head.val
            head = head.next
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`