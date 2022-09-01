---
extends: _layouts.post
section: content
title: Bitwise and of numbers range
problemUrl: https://leetcode.com/problems/bitwise-and-of-numbers-range/
date: 2022-09-01
categories: [bit-manipulation]
---

If the right crosses the next 2^n of left where n is the number of bits for left, that means 2^n >= left, then the result is always going to be 0. For example, AND product of `1010` and `10000` will always be 0. We check that and return early. Else we calculate the values manually and return.

```python
class Solution:
    def rangeBitwiseAnd(self, left: int, right: int) -> int:
        if right >= left << 1:
            return 0

        res = right
        for num in range(left, right):
            res &= num
            
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`