---
extends: _layouts.post
section: content
title: Remove k digits
problemUrl: https://leetcode.com/problems/remove-k-digits/
date: 2022-08-27
categories: [stack]
---

We will use a monotonic decreasing stack to keep track of the digits. We will remove most significant k digits from the stack and then return the values, if the stack is empty at that point we will return 0. While pushing any values in the stack we will also ingore 0, as we can just ignore leading 0's.

```python
class Solution:
    def removeKdigits(self, num: str, k: int) -> str:
        stack = []
        for n in num:
            while stack and k and stack[-1] > n:
                stack.pop()
                k -= 1
            if stack or n != '0':
                stack.append(n)
        
        if k:
            stack = stack[:-k]
        
        return "".join(stack) or "0"
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`