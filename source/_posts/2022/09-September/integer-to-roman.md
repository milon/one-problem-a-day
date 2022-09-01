---
extends: _layouts.post
section: content
title: Integer to roman
problemUrl: https://leetcode.com/problems/integer-to-roman/
date: 2022-09-01
categories: [array-and-hashmap]
---

We will create 2 loopup table, one for ONES and another for FIVES. Then we start from least significant bit, check the value is 4 if we mod it by five, then take the value from FIVES lookup table, else take it from the ONES lookup table. If the the modulas is not 4, we just take values from FIVES if it is bigger than 5, else take the values from ONES. We will repeat this until we reach the most significant bit. Finally we reverse the result string, and return.

```python
class Solution:
    def intToRoman(self, num: int) -> str:
        ONES, FIVES = 'IXCM', 'VLD'
        
        res = ""
        digit = 0
        while num:
            n = num % 10
            if n % 5 == 4:
                res += FIVES[digit] if n == 4 else ONES[digit+1]
                res += ONES[digit]
            else:
                for _ in range(n % 5):
                    res += ONES[digit]
                res += FIVES[digit] if n >= 5 else ''
        
            num //= 10
            digit += 1
        
        return res[::-1]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`