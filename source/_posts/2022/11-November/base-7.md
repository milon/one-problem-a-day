---
extends: _layouts.post
section: content
title: Base 7
problemUrl: https://leetcode.com/problems/base-7/
date: 2022-11-21
categories: [math-and-geometry]
---

We will divide the number by 7 and keep track of the remainder. We will add the remainder to the result and multiply the result by 10. We will repeat this process until the number is 0.

```python
class Solution:
    def convertToBase7(self, num: int) -> str:
        n, res = abs(num), ''
        while n:
            res = str(n%7) + res
            n //= 7
        return '-' * (num < 0) + res or "0"
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`