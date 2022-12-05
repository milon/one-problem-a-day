---
extends: _layouts.post
section: content
title: Fraction to recurring decimal
problemUrl: https://leetcode.com/problems/fraction-to-recurring-decimal/
date: 2022-12-05
categories: [math-and-geometry]
---

We will use a dictionary to store the remainder and the index of the remainder. If the remainder is already in the dictionary, we will add the parenthesis and return the result.

```python
class Solution:
    def fractionToDecimal(self, numerator: int, denominator: int) -> str:
        if denominator == 0:
            return "Invalid"
        if numerator == 0:
            return "0"
        if numerator % denominator == 0:
            return str(numerator // denominator)
        
        sign = '' if numerator * denominator >= 0 else '-'
        numerator, denominator = abs(numerator), abs(denominator)
        res = sign + str(numerator // denominator) + "."
        numerator %= denominator
        i, part = 0, ''
        m = {numerator:i}
        
        while numerator % denominator:
            numerator *= 10
            i += 1
            rem = numerator % denominator
            part += str(numerator // denominator)
            if rem in m:
                part = part[:m[rem]]+'('+part[m[rem]:]+')'
                return res + part
            m[rem] = i
            numerator = rem
        
        return res + part
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`