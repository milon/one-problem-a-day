---
extends: _layouts.post
section: content
title: Recover a tree from preorder traversal
problemUrl: https://leetcode.com/problems/recover-a-tree-from-preorder-traversal/
date: 2022-11-30
categories: [tree]
---

We save the construction path in a stack. In each loop, we get the number level of '-'. We get the value val of node to add. 

If the size of stack is bigger than the level of node, we pop the stack until it's not.

Finally we return the first element in the stack, as it's root of our tree.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def recoverFromPreorder(self, traversal: str) -> Optional[TreeNode]:
        stack, i = [], 0
        
        while i < len(traversal):
            level, val = 0, ""
            
            while i < len(traversal) and traversal[i] == '-':
                level, i = level + 1, i + 1
            
            while i < len(traversal) and traversal[i] != '-':
                val, i = val + traversal[i], i + 1
            
            while len(stack) > level:
                stack.pop()
            
            node = TreeNode(val)
            
            if stack and stack[-1].left is None:
                stack[-1].left = node
            elif stack:
                stack[-1].right = node
            
            stack.append(node)
        
        return stack[0]
```

Time complexity: `O(n)`, n is the length of the string <br/>
Space complexity: `O(n)`