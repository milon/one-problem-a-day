---
extends: _layouts.post
section: content
title: Power of four
problemUrl: https://leetcode.com/problems/power-of-four/
date: 2022-08-22
categories: [math-and-geometry]
---

We will devide the number by 4 until it's 1. If in any step, we have any reminder, we will return false, otherwise return true.

```python
class Solution:
    def isPowerOfFour(self, n: int) -> bool:
        if n == 1:
            return True
        if n < 4:
            return False
        while n > 1:
            if n % 4 ==0:
                n = n/4
            else:
                return False
        return True
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`