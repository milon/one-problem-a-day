---
extends: _layouts.post
section: content
title: Escape the ghosts
problemUrl: https://leetcode.com/problems/escape-the-ghosts/
date: 2022-10-25
categories: [math-and-geometry]
---

We will calculate the Manhattan distance between the ghost and the target. If the ghost is closer to the target than the player, we will return `False`. Otherwise, we will return `True`.

```python
class Solution:
    def escapeGhosts(self, ghosts: List[List[int]], target: List[int]) -> bool:
        x, y = target
        distance = abs(x) + abs(y)
        for i, j in ghosts:
            if distance >= abs(x-i) + abs(y-j):
                return False
        return True
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`