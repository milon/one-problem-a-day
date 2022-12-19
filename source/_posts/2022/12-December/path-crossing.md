---
extends: _layouts.post
section: content
title: Path crossing
problemUrl: https://leetcode.com/problems/path-crossing/
date: 2022-12-19
categories: [array-and-hashmap]
---

We will start with the origin `(0, 0)` and for each move we will update the current position. If the current position is already in the set of visited positions, then we have a path crossing.

```python
class Solution:
    def isPathCrossing(self, path: str) -> bool:
        x, y = 0, 0
        seen = set([(x, y)])
        for p in path:
            if p == 'N': x += 1
            elif p == 'S': x -= 1
            elif p == 'E': y += 1
            else: y -= 1
            if (x, y) in seen:
                return True
            seen.add((x, y))
        return False
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`