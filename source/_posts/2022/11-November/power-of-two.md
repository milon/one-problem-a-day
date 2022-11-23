---
extends: _layouts.post
section: content
title: Power of two
problemUrl: https://leetcode.com/problems/power-of-two/
date: 2022-11-23
categories: [math-and-geometry, bit-maniuplation]
---

We can solve the problem iteratively. If the number is even, we can divide it by 2. If the number is odd, we can return false. We can use bit manipulation to check if the number is odd.

```python
class Solution:
    def isPowerOfTwo(self, n: int) -> bool:
        if n <= 0:
            return False;
        while n % 2 == 0:
            n //= 2;
        return n == 1;
```

Time complexity: `O(log(n))`, n is the value of n <br/>
Space complexity: `O(1)`

We can solve it by using bit manipulation. If the number is power of 2, then the number of 1 in the binary representation of the number is 1. So we can use bit manipulation to check if the number is power of 2.

```python
class Solution:
    def isPowerOfTwo(self, n: int) -> bool:
        return n > 0 and n & (n - 1) == 0
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`