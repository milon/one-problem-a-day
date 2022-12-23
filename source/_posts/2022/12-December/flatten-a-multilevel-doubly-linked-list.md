---
extends: _layouts.post
section: content
title: Flatten a multilevel doubly linked list
problemUrl: https://leetcode.com/problems/flatten-a-multilevel-doubly-linked-list/
date: 2022-12-23
categories: [linked-list, tree]
---

We will use a recursive DFS to solve this problem. We will iterate over the `head` linked list and for each node, we will check if the node has a child. If it does, we will recursively call the function on the child and the next node. We will then set the child's prev to the current node and the current node's next to the child. We will then set the child to null. We will return the head.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val, prev, next, child):
        self.val = val
        self.prev = prev
        self.next = next
        self.child = child
"""

class Solution:
    def flatten(self, head: 'Optional[Node]') -> 'Optional[Node]':
        if not head:
            return None
        
        def flatten_dfs(prev, curr):
            if not curr:
                return prev
            
            curr.prev = prev
            prev.next = curr

            dummyNext = curr.next
            tail = flatten_dfs(curr, curr.child)
            curr.child = None
            return flatten_dfs(tail, dummyNext)
        
        dummy = Node(None, None, head, None)
        flatten_dfs(dummy, head)
        
        dummy.next.prev = None
        return dummy.next
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`