---
extends: _layouts.post
section: content
title: Divide two integers
problemUrl: https://leetcode.com/problems/divide-two-integers/
date: 2022-08-29
categories: [math-and-geometry]
---

We will divide the dividend by the divisor and cast it to an integer. If the answer is bigger than 2^31-1, which is the highest value of 32-bit integer, we cap it to the highest 32-bit integer value, and return the result.

```python
class Solution:
    def divide(self, dividend: int, divisor: int) -> int:
        ans = int(dividend/divisor)
        if ans > 2**31-1:
            ans = 2**31-1
        return ans
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`
