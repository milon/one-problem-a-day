---
extends: _layouts.post
section: content
title: Multiply strings
problemUrl: https://leetcode.com/problems/multiply-strings/
date: 2022-08-07
categories: [math-and-geometry]
---

We will first reverse both string and then calculate the first characters of both string, to get the digit. Then we store this digit at (i1+i2) position of our result. The (i1+i2+1) position will store the remaining value after 1st digit and (i1+i2) position we store the last digit. Then finally we join the res array as string and return. 

```python
class Solution:
    def multiply(self, num1: str, num2: str) -> str:
        if "0" in [num1, num2]:
            return "0"
        
        res = [0] * (len(num1) + len(num2))
        num1, num2 = num1[::-1], num2[::-1]
        for i1 in range(len(num1)):
            for i2 in range(len(num2)):
                digit = int(num1[i1]) * int(num2[i2])
                res[i1 + i2] += digit
                res[i1 + i2 + 1] += res[i1 + i2] // 10
                res[i1 + i2] = res[i1 + i2] % 10
        
        res, beg = res[::-1], 0
        while beg < len(res) and res[beg] == 0:
            beg += 1
        res = map(str, res[beg:])
        return "".join(res)
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n+m)`