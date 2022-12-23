---
extends: _layouts.post
section: content
title: Convert binary search tree to sorted doubly linked list
problemUrl: https://leetcode.com/problems/convert-binary-search-tree-to-sorted-doubly-linked-list/
date: 2022-12-23
categories: [linked-list, tree]
---

We do an inorder traversal and make an arr of sorted nodes. We then create the doubly linked list by iterating through the array.
    
```python
"""
# Definition for a Node.
class Node:
    def __init__(self, val, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
"""

class Solution:
    def treeToDoublyList(self, root: 'Optional[Node]') -> 'Optional[Node]':
        if not root:
            return None
        
        arr = []
        def inorder(root):
            if not root:
                return
            inorder(root.left)
            arr.append(root)
            inorder(root.right)
        inorder(root)

        n = len(arr)
        for i in range(n):
            arr[i].left = arr[(i-1)%n]
            arr[i].right = arr[(i+1)%n]
        arr[0].left = arr[-1]
        arr[-1].right = arr[0]
        
        return arr[0]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`