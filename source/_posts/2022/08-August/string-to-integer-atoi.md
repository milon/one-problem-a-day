---
extends: _layouts.post
section: content
title: String to integer atoi
problemUrl: https://leetcode.com/problems/string-to-integer-atoi/
date: 2022-08-16
categories: [math-and-geometry]
---

First we will strip any whitespace characters, and then check if the length is zero, we immediately return 0. Then we check the sign, if the sign is `+` or `-`, we keep that in a sign variable and delete that from the numbers. Then iterate over the whole array and if the character is numberic, we multiply that with our result and add that number. Initially our result will be zero. When our calculation is done, then we multiply that with the sign. If our result is not within 32-bit int number, we will just replace it with the boundary number.

```python
class Solution:
    def myAtoi(self, s: str) -> int:
        ls = list(s.strip())
        if len(ls) == 0:
            return 0
        
        MAX_NUM = 2 ** 31 - 1
        MIN_NUM = -2 ** 31
        sign = -1 if ls[0] == '-' else 1
        
        if ls[0] in ['-', '+']:
            ls.pop(0)
        
        res, i = 0, 0
        while i < len(ls) and ls[i].isdigit():
            res = res*10 + int(ls[i])
            i += 1
            
        return max(MIN_NUM, min(MAX_NUM, sign*res))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`