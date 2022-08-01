---
extends: _layouts.post
section: content
title: Copy list with random pointer
problemUrl: https://leetcode.com/problems/copy-list-with-random-pointer/
date: 2022-08-01
categories: [linked-list]
---

We will traverse the whole list twice, first time we create a hashmap to store all the nodes without any linking. Then we traverse it again, but this time, as we already have all the nodes, we will just link both pointers. Then return the head of new list.

```python
"""
# Definition for a Node.
class Node:
    def __init__(self, x: int, next: 'Node' = None, random: 'Node' = None):
        self.val = int(x)
        self.next = next
        self.random = random
"""

class Solution:
    def copyRandomList(self, head: 'Optional[Node]') -> 'Optional[Node]':
        oldCopy = {None: None}
        
        cur = head
        while cur:
            copy = Node(cur.val)
            oldCopy[cur] = copy
            cur = cur.next
            
        cur = head
        while cur:
            copy = oldCopy[cur]
            copy.next = oldCopy[cur.next]
            copy.random = oldCopy[cur.random]
            cur = cur.next
        
        return oldCopy[head]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`