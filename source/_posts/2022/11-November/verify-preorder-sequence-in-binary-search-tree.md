---
extends: _layouts.post
section: content
title: Verify preorder sequence in binary search tree
problemUrl: https://leetcode.com/problems/verify-preorder-sequence-in-binary-search-tree/
date: 2022-11-30
categories: [tree]
---

Using stack for storing the current node as a check point for the next element. Once the current is larger than the last element in the stack, we know we should take it as the right node. The last element poping out from the stack will be also a checking point. We will use it to validate the BST property of the current element/node.

```python
class Solution:
    def verifyPreorder(self, preorder: List[int]) -> bool:
        stack = []
        low = -math.inf
        for num in preorder:
            if num < low:
                return False
            while stack and num > stack[-1]:
                low = stack.pop()
            stack.append(num)
        return True
```