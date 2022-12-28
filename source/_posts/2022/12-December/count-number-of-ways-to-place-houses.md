---
extends: _layouts.post
section: content
title: Count number of ways to place houses
problemUrl: https://leetcode.com/problems/count-number-of-ways-to-place-houses/
date: 2022-12-28
categories: [math-and-geometry]
---

One side of the road has no effect on the other side of the road, so we can put house in both side independently. For one side, we could have number of ways as fibonacci sequence. We we calculate the number of ways for both side, we have to multiply them together.

```python
class Solution:
    def countHousePlacements(self, n: int) -> int:
        MOD = 10**9+7
        a, b = 1, 1
        for i in range(n):
            a, b = b, (a+b) % MOD
        return (b*b) % MOD
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
