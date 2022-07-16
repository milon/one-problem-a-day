---
extends: _layouts.post
section: content
title: Valid parentheses
problemUrl: https://leetcode.com/problems/valid-parentheses/
date: 2022-07-16
categories: [stack]
---

We can iterate over each characters of the string, and if it's a opening braket, we push it to the stack. If not, then we check, if it matches the top of the stack braket. If matches then we pop it from the stack, otherwise we immediately return false. After the whole traversal, if the stack is empty then we are sure that the string is valid.

```python
class Solution:
    def isValid(self, s: str) -> bool:
        Map = {')': '(', '}': '{', ']' : '['}
        stack = []
        for c in s:
            if c not in Map:
                stack.append(c)
                continue
            if not stack or stack[-1] != Map[c]:
                return False
            stack.pop()
        return not stack
```

Time Complexity: O(n) <br/>
Space Complexity: O(n)

