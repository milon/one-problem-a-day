---
extends: _layouts.post
section: content
title: Check if number is a sum of powers of three
problemUrl: https://leetcode.com/problems/check-if-number-is-a-sum-of-powers-of-three/
date: 2023-01-04
categories: [math-and-geometry]
---

We will divide the number by 3 until it becomes 0. If the remainder is 1, then we add 1 to the result. Otherwise, we add 0 to the result.

```python
class Solution:
    def checkPowersOfThree(self, n: int) -> bool:
        while n > 0:
            if n % 3 == 2:
                return False
            else:
                n //= 3
        return True
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`