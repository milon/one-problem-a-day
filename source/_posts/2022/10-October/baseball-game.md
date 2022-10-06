---
extends: _layouts.post
section: content
title: Baseball game
problemUrl: https://leetcode.com/problems/baseball-game/
date: 2022-10-06
categories: [stack]
---

We will use a stack to add the input and from there we will just follow the problem statement instruction. Finally we will return the sum of stack itself as result.

```python
class Solution:
    def calPoints(self, operations: List[str]) -> int:
        stack = []
        for op in operations:
            if op == 'C':
                stack.pop()
            elif op == 'D':
                stack.append(stack[-1]*2)
            elif op == '+':
                stack.append(stack[-1]+stack[-2])
            else:
                stack.append(int(op))
        return sum(stack)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`