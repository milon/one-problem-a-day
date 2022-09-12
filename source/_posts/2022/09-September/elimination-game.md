---
extends: _layouts.post
section: content
title: Elimination game
problemUrl: https://leetcode.com/problems/elimination-game/
date: 2022-09-12
categories: [math-and-geometry]
---

We will recursively eleminate people from beginning to end and then return backword with the same logic until only one person left, then return that.

```python
class Solution:
    def lastRemaining(self, n: int) -> int:
        def eliminate(numbersCount, isForward, base, step):
            if numbersCount == 1:
                return base + 1
            if isForward or numbersCount % 2 == 1:
                base += step // 2
            
            step *= 2
            numbersCount //= 2
            return eliminate(numbersCount, not isForward, base, step)
        
        return eliminate(n, True, 0, 2)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`