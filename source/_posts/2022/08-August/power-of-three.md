---
extends: _layouts.post
section: content
title: Power of three
problemUrl: https://leetcode.com/problems/power-of-three/
date: 2022-08-24
categories: [math-and-geometry]
---

We will devide the number by 3 until it's 1. If in any step, we have any reminder, we will return false, otherwise return true.

```python
class Solution:
    def isPowerOfThree(self, n: int) -> bool:
        if n == 1:
            return True
        if n < 3:
            return False
        while n > 1:
            if n % 3 == 0:
                n /= 3
            else:
                return False
        return True
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`