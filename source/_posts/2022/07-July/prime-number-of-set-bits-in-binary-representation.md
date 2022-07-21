---
extends: _layouts.post
section: content
title: Prime number of set bits in binary representation
problemUrl: https://leetcode.com/problems/prime-number-of-set-bits-in-binary-representation/
date: 2022-07-21
categories: [math-and-geometry]
---

This is a very strait forward problem. We will have 2 helper function, one is for counting the number of bits in an integer and another for checking if the number is prime or not. Then we iterate over our limit, count every numbers' bit, then check if it is prime, then we increase our prime count. After the iteration is done, we return the result.

```python
from math import floor, sqrt

class Solution:
    def countPrimeSetBits(self, left: int, right: int) -> int:
        count = 0
        for num in range(left, right+1):
            bits = self.countBits(num)
            if self.isPrime(bits) == True:
                count += 1
        return count
    
    def isPrime(self, num: int) -> bool:
        if num < 2: return False
        if num == 2: return True
        if num % 2 == 0: return False
        for i in range(3, floor(sqrt(num))+1, 2):
            if num % i == 0:
                return False
        return True
    
    def countBits(self, num: int) -> int:
        count = 0
        while num:
            count += num & 1
            num >>= 1
        return count
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`