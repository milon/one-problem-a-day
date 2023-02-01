---
extends: _layouts.post
section: content
title: Greatest common divisor of strings
problemUrl: https://leetcode.com/problems/greatest-common-divisor-of-strings/
date: 2023-02-01
categories: [math-and-geometry]
---

We will check if the length of `str1` is divisible by the length of `str2`. If it is, we will check if `str1` is equal to `str2` multiplied by the length of `str1` divided by the length of `str2`. If it is, we will return `str2`. Otherwise, we will return an empty string. If the length of `str1` is not divisible by the length of `str2`, we will check if the length of `str2` is divisible by the length of `str1`. If it is, we will check if `str2` is equal to `str1` multiplied by the length of `str2` divided by the length of `str1`. If it is, we will return `str1`. Otherwise, we will return an empty string.

```python
class Solution:
    def gcdOfStrings(self, str1: str, str2: str) -> str:
        if len(str1) % len(str2) == 0:
            if str1 == str2 * (len(str1) // len(str2)):
                return str2
            else:
                return ""
        elif len(str2) % len(str1) == 0:
            if str2 == str1 * (len(str2) // len(str1)):
                return str1
            else:
                return ""
        else:
            return ""
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

We can achieve the same thing using the `math.gcd` function.

```python
class Solution:
    def gcdOfStrings(self, str1: str, str2: str) -> str:
        return str1[:math.gcd(len(str1), len(str2))] if str1+str2 == str2+str1 else ""
```
