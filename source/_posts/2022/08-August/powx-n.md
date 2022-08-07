---
extends: _layouts.post
section: content
title: Pow(x, n)
problemUrl: https://leetcode.com/problems/powx-n/
date: 2022-08-07
categories: [math-and-geometry]
---

We will follow divide and conquar method to solve the problems. We we divide the n until it's a single digit, then the muliplication result is the number itself. When we merge it, we will join the numbers by multiply themselves. If the input n is negetaive, then we just divide 1 by the result.

```python
class Solution:
    def myPow(self, x: float, n: int) -> float:
        def helper(x, n):
            if x == 0:
                return 0
            if n == 0:
                return 1

            res = helper(x * x, n // 2)
            return x * res if n % 2 else res

        res = helper(x, abs(n))
        return res if n >= 0 else 1 / res
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(n)`