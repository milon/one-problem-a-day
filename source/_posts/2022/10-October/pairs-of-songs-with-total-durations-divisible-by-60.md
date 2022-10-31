---
extends: _layouts.post
section: content
title: Pairs of songs with total durations divisible by 60
problemUrl: https://leetcode.com/problems/pairs-of-songs-with-total-durations-divisible-by-60/
date: 2022-10-31
categories: [math-and-geometry]
---

Calculate the time % 60 then it will be exactly same as two sum problem.

```python
class Solution:
    def numPairsDivisibleBy60(self, time: List[int]) -> int:
        lookup = [0] * 60
        res = 0
        for t in time:
            x = t % 60
            res += lookup[60-x] if x > 0 else lookup[0]
            lookup[x] += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`