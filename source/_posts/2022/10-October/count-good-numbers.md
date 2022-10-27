---
extends: _layouts.post
section: content
title: Count good numbers
problemUrl: https://leetcode.com/problems/count-good-numbers/
date: 2022-10-27
categories: [math-and-geometry]
---

There are 5 possibilities for even positions(0, 2, 4, 6, 8) and 4 for odd positions(2, 3, 5, 7). Therefore the answer for every n is 5^number of even places * 4^number of odd places.

```python
class Solution:
    def countGoodNumbers(self, n: int) -> int:
        MOD = 10**9+7
        evens, odds = (n+1)//2, n//2
        return (pow(5, evens, MOD) * pow(4, odds, MOD)) % MOD
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`