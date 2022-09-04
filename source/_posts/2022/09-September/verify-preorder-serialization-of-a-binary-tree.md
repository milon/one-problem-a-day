---
extends: _layouts.post
section: content
title: Verify preorder serialization of a binary tree
problemUrl: https://leetcode.com/problems/verify-preorder-serialization-of-a-binary-tree/
date: 2022-09-04
categories: [stack]
---

We will split the string with `,` as delimeter, and pop the last value from it to check whether it's a `#` or not, if not, we immediately return false. Then we iterate over the values, if the character is not `#` we append it to the stack and if yes, we pop it from the stack if stack is not empty, if the stack is empty at any point, we will return false again. Finally when the iteration is done, if the stack is empty, we return true else return false.

```python
class Solution:
    def isValidSerialization(self, preorder: str) -> bool:
        preorder = preorder.split(',')
        stack = []
        
        if preorder.pop() != '#':
            return False
        
        for c in preorder:
            if c != '#':
                stack.append(c)
            else:
                if not stack:
                    return False
                else:
                    stack.pop()
        return len(stack) == 0
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`