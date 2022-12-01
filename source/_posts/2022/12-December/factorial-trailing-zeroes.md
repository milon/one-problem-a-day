---
extends: _layouts.post
section: content
title: Factorial trailing zeroes
problemUrl: https://leetcode.com/problems/factorial-trailing-zeroes/
date: 2022-12-01
categories: [math-and-geometry]
---

We will count the number of trailing zeroes in the factorial of the given number. We will count the number of 5s in the factorial of the given number. We will keep dividing the number by 5 and add the quotient to the count. At the end we will return the count.

```python
class Solution:
    def trailingZeroes(self, n: int) -> int:
        count = 0
        while n:
            n //= 5
            count += n
        return count
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`
