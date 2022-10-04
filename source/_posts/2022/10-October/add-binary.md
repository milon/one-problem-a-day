---
extends: _layouts.post
section: content
title: Add binary
problemUrl: https://leetcode.com/problems/add-binary/
date: 2022-10-04
categories: [bit-manipulation]
---

We will start from the end character of each number, add that and if the sum is more than 2, we take the reminder to the next digit, and add the last digit to our result. We will continue the process until the beginning of both number.

```python
class Solution:
    def addBinary(self, a: str, b: str) -> str:
        rem, res = 0, ''
        a, b = list(a), list(b)
        
        while a or b:
            if a: rem += int(a.pop())
            if b: rem += int(b.pop())
            res = str(rem%2) + res
            rem //= 2
        
        return str(rem)+res if rem == 1 else res
```

Time Complexity: `O(max(n, m))` <br/>
Space Complexity: `O(1)`
