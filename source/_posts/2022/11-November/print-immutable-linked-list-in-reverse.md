---
extends: _layouts.post
section: content
title: Print immutable linked list in reverse
problemUrl: https://leetcode.com/problems/print-immutable-linked-list-in-reverse/
date: 2022-11-29
categories: [linked-list, stack]
---

We can use a stack to store the values of the linked list. We will then pop the values from the stack and print them.

```python
# """
# This is the ImmutableListNode's API interface.
# You should not implement it, or speculate about its implementation.
# """
# class ImmutableListNode:
#     def printValue(self) -> None: # print the value of this node.
#     def getNext(self) -> 'ImmutableListNode': # return the next node.

class Solution:
    def printLinkedListInReverse(self, head: 'ImmutableListNode') -> None:
        stack = []
        while head:
            stack.append(head)
            head = head.getNext()
        
        while stack:
            stack.pop().printValue()
```

Time complexity: `O(n)`, n is the number of nodes in the linked list <br/>
Space complexity: `O(n)`

We can achieve the same result using recursion.

```python
class Solution:
    def printLinkedListInReverse(self, head: 'ImmutableListNode') -> None:
        if head:
            self.printLinkedListInReverse(head.getNext())
            head.printValue()
```
