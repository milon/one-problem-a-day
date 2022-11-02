---
extends: _layouts.post
section: content
title: Largest 3 same digit number in string
problemUrl: https://leetcode.com/problems/largest-3-same-digit-number-in-string/
date: 2022-11-02
categories: [array-and-hashmap]
---

We will start from 9 till 0 and try to find the largest 3 same digit number in the string. If we find it, we return it. Otherwise, we return empty string.

```python
class Solution:
    def largestGoodInteger(self, num: str) -> str:
        for digit in range(9, -1, -1):
            sub = str(digit) * 3
            if sub in num:
                return sub
        return ''
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`