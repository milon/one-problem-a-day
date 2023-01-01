---
extends: _layouts.post
section: content
title: Distinct prime factors of product of array
problemUrl: https://leetcode.com/problems/distinct-prime-factors-of-product-of-array/
date: 2023-01-01
categories: [math-and-geometry]
---

First we calculate all the prime numbers up to `n` using the Sieve of Eratosthenes. Then we iterate over the array and for each element we will increment the counter for each prime factor of the element. Finally, we will iterate over the counter and check if the number of times each prime factor appears is a divisor of the product of the array.

```python
class Solution:
    def distinctPrimeFactors(self, nums: List[int]) -> int:
        def sieve(n: int) -> List[int]:
            # Generate a list of prime numbers up to n
            primes = []
            is_prime = [True] * (n + 1)
            is_prime[0] = is_prime[1] = False
            for i in range(2, n + 1):
                if is_prime[i]:
                    primes.append(i)
                for p in primes:
                    if i * p > n:
                        break
                    is_prime[i * p] = False
                    if i % p == 0:
                        break
            return primes
        
        res = set()
        primes = sieve(max(nums))
        for num in nums:
            for p in primes:
                if p > num:
                    break
                while num % p == 0:
                    res.add(p)
                    num = num // p
            if num > 1:
                res.add(num)
        
        return len(res)
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`