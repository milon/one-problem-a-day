---
extends: _layouts.post
section: content
title: Count primes
problemUrl: https://leetcode.com/problems/count-primes/
date: 2022-09-05
categories: [math-and-geometry]
---

We will use the algorithm Sieve of Eratosthenes to find the number of primes within a range.

```python
class Solution:
    def countPrimes(self, n: int) -> int:
        if n <= 2:
            return 0
        count = 0
        is_prime = [False, False] + [True] * (n - 1)
        for p in range(2, n):
            if is_prime[p]:
                count += 1
                for i in range(2*p, n, p):
                    is_prime[i] = False
        return count
```

Time Complexity: `O(nlog(log(n)))` <br/>
Space Complexity: `O(n)`
