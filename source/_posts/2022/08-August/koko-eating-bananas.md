---
extends: _layouts.post
section: content
title: Koko eating bananas
problemUrl: https://leetcode.com/problems/koko-eating-bananas/
date: 2022-08-01
categories: [binary-search]
---

We will search through each position of the piles till the largest pile, where it allows us to eat all the bananas within given h hours. We can do it in brute force, but if we search with binary search, we can reduce the time complexity in logarithmic time.

```python
class Solution:
    def minEatingSpeed(self, piles: List[int], h: int) -> int:
        l, r = 1, max(piles)

        k = 0
        while l <= r:
            m = (l+r) // 2
            time = 0
            for p in piles:
                time += ((p - 1) // m) + 1
            if time <= h:
                k = m
                r = m - 1
            else:
                l = m + 1
        return k
```

Time Complexity: `O(p * log(max(p)))`, where p is the piles array length. <br/>
Space Complexity: `O(1)`
