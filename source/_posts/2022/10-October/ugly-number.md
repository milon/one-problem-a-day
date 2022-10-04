---
extends: _layouts.post
section: content
title: Ugly number
problemUrl: https://leetcode.com/problems/ugly-number/
date: 2022-10-04
categories: [math-and-geometry]
---

If the number is negative, then it's not a ugly number. Then we do exactly what the problem statement says, we divide the number by 2, 3 and 5 until we can't divide it any more with these numbers. If the remainder is 1, then it's an ugly number.

```python
class Solution:
    def isUgly(self, n: int) -> bool:
        if n <= 0:
            return False
        for i in 2,3,5:
            while n % i == 0 and n>0:
                n //= i
        return n == 1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`