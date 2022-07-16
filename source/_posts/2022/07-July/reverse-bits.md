---
extends: _layouts.post
section: content
title: Reverse bits
problemUrl: https://leetcode.com/problems/reverse-bits/
date: 2022-07-16
categories: [bit-manipulation]
---

We can iterate over all 32 bits of our given number, then put it on the opposite bit or our result. If we take i-th bit, we will put it in the (31-i)th bit of our result.

```python
class Solution:
    def reverseBits(self, n: int) -> int:
        res = 0
        for i in range(32):
            bit = (n >> i) & 1
            res = res | (bit << (31-i))
        return res
```

Time Complexity: O(1), as we always iterate 32 times. <br/>
Space Complexity: O(1)