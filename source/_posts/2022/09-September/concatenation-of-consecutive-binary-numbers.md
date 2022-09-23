---
extends: _layouts.post
section: content
title: Concatenation of consecutive binary numbers
problemUrl: https://leetcode.com/problems/concatenation-of-consecutive-binary-numbers/
date: 2022-09-23
categories: [bit-manipulation]
---

We will take a brute force approach to solve the problem. But rather than using `bin` function to convert the number to binary, which is prefixed with `0b`, we can use the format function to get rid of those prefixes. Then we can convert the string to binary again using the `int` function by passing 2 as the second parameter. Finally we mod the integer value with the given mod and return as result.

```python
class Solution:
    def concatenatedBinary(self, n: int) -> int:
        MOD = 10**9 + 7
        string = ""
        
        for i in range(1, n+1):
            string += format(i, "b")
        
        return int(string,2) % MOD
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`