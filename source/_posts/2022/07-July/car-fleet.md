---
extends: _layouts.post
section: content
title: Car fleet
problemUrl: https://leetcode.com/problems/car-fleet/
date: 2022-07-30
categories: [stack]
---

First we will create a pair with position and speed, and sort it by the position. Then we start at the position which is closer to the target. Then we will calculate how much time it's needed to reach the target by this formula, `(target-position)/speed`. Then we push it to a stack. If the stack has more that 1 value, then we compare the value, if it's less than or equal to the previous one, then we merge them together by poping from the stack. Once the iteration is done then we return the number of elements in the stack, which represents the number of car fleet.

```python
class Solution:
    def carFleet(self, target: int, position: List[int], speed: List[int]) -> int:
        pair = [[p, s] for p, s in zip(position, speed)]

        stack = []
        for p, s in sorted(pair)[::-1]:
            stack.append((target-p)/s)
            if len(stack) >= 2 and stack[-1] <= stack[-2]:
                stack.pop()

        return len(stack)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`