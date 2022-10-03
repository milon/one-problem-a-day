---
extends: _layouts.post
section: content
title: Asteroid collision
problemUrl: https://leetcode.com/problems/asteroid-collision/
date: 2022-10-03
categories: [stack]
---

We will take a stack and iterate over all the elements. If the element is positive, we append it on the stack. Else we take the number, check the value of the number. If it is equal to the top of the stack, we pop both of them. If it is greater, we replace the top of the stack with this value, if it is smaller, we remove it from the stack. Finally after iterating over all the elements, we return the stack as result.

```python
class Solution:
    def asteroidCollision(self, asteroids: List[int]) -> List[int]:
        stack = []
        for asteroid in asteroids:
            if asteroid > 0:
                stack.append(asteroid)
            else:
                while stack and stack[-1]>0 and stack[-1]<abs(asteroid):
                    stack.pop()
                if not stack or stack[-1]<0:
                    stack.append(asteroid)
                elif stack[-1] == -asteroid:
                    stack.pop()
        return stack
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`