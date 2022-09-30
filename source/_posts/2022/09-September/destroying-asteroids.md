---
extends: _layouts.post
section: content
title: Destroying asteroids
problemUrl: https://leetcode.com/problems/destroying-asteroids/
date: 2022-09-30
categories: [greedy]
---

We can sort the arstroids and greedy simulate the process described in the problem statement. If at any point the mass is less that the asteroid, then we return false, otherwise if we can finish iterating over every asteroid, then we return true.

```python
class Solution:
    def asteroidsDestroyed(self, mass: int, asteroids: List[int]) -> bool:
        for a in sorted(asteroids):
            if a > mass:
                return False
            mass += a
        return True
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`