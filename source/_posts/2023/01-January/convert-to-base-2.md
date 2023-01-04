---
extends: _layouts.post
section: content
title: Convert to base -2
problemUrl: https://leetcode.com/problems/convert-to-base-2/
date: 2023-01-04
categories: [math-and-geometry]
---

We will use the following formula to convert a number `n` to base `-2`, where `n` is a non-negative integer-
- Write a base 2 function
- If the number is odd, add 1 to the result
- Divide the number by 2

```python
class Solution:
    def baseNeg2(self, n: int) -> str:
        if n == 0:
            return '0'
        res = ''
        while n:
            res = str(n & 1) + res
            n = -(n >> 1)
        return res
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(log(n))`