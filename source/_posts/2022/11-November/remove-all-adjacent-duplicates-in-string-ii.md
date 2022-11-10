---
extends: _layouts.post
section: content
title: Remove all adjacent duplicates in string II
problemUrl: https://leetcode.com/problems/remove-all-adjacent-duplicates-in-string-ii/
date: 2022-11-10
categories: [stack]
---

We will use a stack to keep track of the characters in the string. We will then iterate through the string and if the stack is empty or the top of the stack is not equal to the current character, we will push the current character onto the stack. Otherwise, we will pop the top of the stack. We will then return the stack as a string.

```python
class Solution:
    def removeDuplicates(self, s: str, k: int) -> str:
        stack = []
        for c in s:
            if not stack or stack[-1][0] != c:
                stack.append([c, 1])
            else:
                stack[-1][1] += 1
                if stack[-1][1] == k:
                    stack.pop()
        return ''.join(c * k for c, k in stack)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`