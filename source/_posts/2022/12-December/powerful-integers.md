---
extends: _layouts.post
section: content
title: Powerful integers
problemUrl: https://leetcode.com/problems/powerful-integers/
date: 2022-12-18
categories: [math-and-geometry]
---

We can use brute force to calculate all the possible values of `x^i + y^j` until the value is less than the bound and store them in a set. Then we can return the set as a list.

```python
class Solution:
    def powerfulIntegers(self, x: int, y: int, bound: int) -> List[int]:
        num = set()
        for i in range(0, 100):
            for j in range(0, 100):
                a = x**i + y**j
                if a <= bound:
                    num.add(a)
                else:
                    break
        return list(num)
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`