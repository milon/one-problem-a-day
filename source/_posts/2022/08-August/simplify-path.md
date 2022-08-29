---
extends: _layouts.post
section: content
title: Simplify path
problemUrl: https://leetcode.com/problems/simplify-path/
date: 2022-08-29
categories: [stack]
---

First we will split the the path with `/` as delimeter. Then we iterate over the items of the path, if the item is `.` or empty, we just ignore it. If the item is anything but `..`, then we append it to a stack, else we pop it from the stack. When the iteration is done, we join the elements of the stack with `/` and return.

```python
class Solution:
    def simplifyPath(self, path: str) -> str:
        stack = []
        path = path.split('/')
        
        for item in path:
            if item == '' or item == '.':
                continue
            if item == '..':
                if stack: 
                    stack.pop()
            else:
                stack.append(item)
        
        return '/' + '/'.join(stack)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`