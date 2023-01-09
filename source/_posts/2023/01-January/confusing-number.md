---
extends: _layouts.post
section: content
title: Confusing number
problemUrl: https://leetcode.com/problems/confusing-number/
date: 2023-01-09
categories: [array-and-hashmap]
---

We will use a dictionary to map the digits to their confusing digits. We will iterate through the digits of the number and check if the confusing digit is the same as the original digit. If it is, we will return `False`. If it is not, we will add the confusing digit to the result. We will return `True` if the result is different from the original number.

```python
class Solution:
    def confusingNumber(self, N: int) -> bool:
        d = {0:0, 1:1, 6:9, 8:8, 9:6}
        res = 0
        n = N
        while n:
            digit = n % 10
            if digit not in d:
                return False
            res = res * 10 + d[digit]
            n //= 10
        return res != N
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`
