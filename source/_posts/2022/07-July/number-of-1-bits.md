---
extends: _layouts.post
section: content
title: Number of 1 bits
problemUrl: https://leetcode.com/problems/number-of-1-bits/
date: 2022-07-13
categories: [bit-manipulation]
---

We can logical and any number with 1 to check whether the last bit of that number is 1 or 0. We can also check this by checking the number is odd or even. Odd numbers always has last bit as 1. We count that bit and then write shift the number 1 bit to get the next bit. Finally after going through every bit, we return the result.

```python
class Solution:
    def hammingWeight(self, n: int) -> int:
        count = 0
        while n:
            count += n & 1
            n >>= 1
        return count
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`
