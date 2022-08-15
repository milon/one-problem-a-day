---
extends: _layouts.post
section: content
title: Prime number of set bits in binary representation
problemUrl: https://leetcode.com/problems/prime-number-of-set-bits-in-binary-representation/
date: 2022-08-15
categories: [bit-manipulation]
---

We will create 2 helper function, one for checking the prime number, another for counting the number of 1 bits. Then we iterate over the range, then count the number of bits, and then check whether the bit count is prime or not. If the bit count is prime we increate our result and finally return it after the iteration is over.

```python
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

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`