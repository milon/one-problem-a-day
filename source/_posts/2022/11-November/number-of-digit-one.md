---
extends: _layouts.post
section: content
title: Number of digit one
problemUrl: https://leetcode.com/problems/number-of-digit-one/
date: 2022-11-17
categories: [math-and-geometry]
---

We will create a function `countDigitOne` which will take a number as input. We will initialize a variable `count` to `0`. We will initialize a variable `factor` to `1`. We will run a loop until `factor` is less than or equal to the input number. We will initialize a variable `remainder` to the input number modulo `factor`. We will initialize a variable `quotient` to the input number divided by `factor`. We will initialize a variable `digit` to the quotient modulo `10`. We will add the quotient divided by `10` to `count` if the digit is greater than `1`. We will add the remainder plus `1` to `count` if the digit is equal to `1`. We will multiply `factor` by `10`. We will return `count`.

```python
class Solution:
    def countDigitOne(self, n: int) -> int:
        def countDigitOne(n):
            count = 0
            factor = 1
            while factor <= n:
                remainder = n % factor
                quotient = n // factor
                digit = quotient % 10
                count += quotient // 10 * factor
                if digit == 1:
                    count += remainder + 1
                elif digit > 1:
                    count += factor
                factor *= 10
            return count
        return countDigitOne(n)
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`