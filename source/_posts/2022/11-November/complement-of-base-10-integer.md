---
extends: _layouts.post
section: content
title: Complement of base 10 integer
problemUrl: https://leetcode.com/problems/complement-of-base-10-integer/
date: 2022-11-24
categories: [bit-maniuplation]
---

What is the relationship between input and output? input + output = 111....11 in binary format.
Is there any corner case? 0 is a corner case expecting 1, output > input.

We can solve it by using bit manipulation. We can use `~` to flip the bits of the input. We can use `<<` to shift the bits of the input to the left until the input is greater than or equal to the output. We can use `>>` to shift the bits of the input to the right until the input is equal to the output.

```python
class Solution:
    def bitwiseComplement(self, n: int) -> int:
        if n == 0:
            return 1
        output = 0
        while output < n:
            output = (output << 1) + 1
        return output ^ n
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`