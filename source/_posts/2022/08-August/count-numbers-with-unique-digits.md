---
extends: _layouts.post
section: content
title: Count numbers with unique digits
problemUrl: https://leetcode.com/problems/count-numbers-with-unique-digits/
date: 2022-11-11
categories: [math-and-geometry]
---

For the first (most left) digit, we have 9 options (no zero); for the second digit we used one but we can use 0 now, so 9 options; and we have 1 less option for each following digits. Number can not be longer than 10 digits.

```python
class Solution:
    def countNumbersWithUniqueDigits(self, n: int) -> int:
        res, temp = 1, 1
        for i in range(1, n+1):
            res = 9 * temp + res
            temp = temp * (10-i)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`