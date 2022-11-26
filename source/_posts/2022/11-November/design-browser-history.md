---
extends: _layouts.post
section: content
title: Design browser history
problemUrl: https://leetcode.com/problems/design-browser-history/
date: 2022-11-26
categories: [linked-list]
---

We can use a doubly linked list to store the history. We can use a pointer to point to the current node. We can use `visit` to add a new node to the end of the list. We can use `back` and `forward` to move the pointer to the previous node and the next node.

```python
class Node:
    def __init__(self, url):
        self.url = url
        self.prev = None
        self.next = None

class BrowserHistory:
    def __init__(self, homepage: str):
        self.head = Node(homepage)
        self.current = self.head

    def visit(self, url: str) -> None:
        node = Node(url)
        self.current.next = node
        node.prev = self.current
        self.current = node

    def back(self, steps: int) -> str:
        while steps and self.current.prev:
            self.current = self.current.prev
            steps -= 1
        return self.current.val

    def forward(self, steps: int) -> str:
        while steps and self.current.next:
            self.current = self.current.next
            steps -= 1
        return self.current.val
```

Time complexity: `O(n)`, n is the number of operations <br/>
Space complexity: `O(n)`
