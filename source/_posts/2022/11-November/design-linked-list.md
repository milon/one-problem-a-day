---
extends: _layouts.post
section: content
title: design linked list
problemUrl: https://leetcode.com/problems/design-linked-list/
date: 2022-11-21
categories: [linked-list, design]
---

We will use a stack to store the values and then do the operations on the stack.

```python
class MyLinkedList:
    def __init__(self):
    self.stack = []

    def get(self, index):
        if index < len(self.stack):
            return self.stack[index]
        else:
            return -1

    def addAtHead(self, val):
        self.stack.insert(0, val)

    def addAtTail(self, val):
        self.stack.append(val)

    def addAtIndex(self, index, val):
        if index < len(self.stack):
            self.stack.insert(index, val)
        elif index == len(self.stack):
            self.stack.append(val)
        
    def deleteAtIndex(self, index):
        if index < len(self.stack):
            self.stack.pop(index)
```