---
extends: _layouts.post
section: content
title: Ugly number III
problemUrl: https://leetcode.com/problems/ugly-number-iii/
date: 2022-12-14
categories: [math-and-geometry]
---

We will use a binary search approach to solve this problem. We will find the smallest number that is divisible by `a`, `b`, and `c`. We will find the smallest number that is divisible by `a` and `b`. We will find the smallest number that is divisible by `a` and `c`. We will find the smallest number that is divisible by `b` and `c`. We will find the smallest number that is divisible by `a`. We will find the smallest number that is divisible by `b`. We will find the smallest number that is divisible by `c`. We will calculate the number of ugly numbers that are less than or equal to the current number. If the number of ugly numbers is less than `n`, we will update the left of the binary search to the current number. Otherwise, we will update the right of the binary search to the current number.

```python
class Solution:
    def nthUglyNumber(self, n: int, a: int, b: int, c: int) -> int:
        def lcm(x, y):
            return x*y//math.gcd(x, y)

        def count(x):
            return x//a + x//b + x//c - x//lcm(a, b) - x//lcm(a, c) - x//lcm(b, c) + x//lcm(a, lcm(b, c))
        
        l, r = 1, 2*10**9
        while l < r:
            mid = (l+r)//2
            if count(mid) < n:
                l = mid+1
            else:
                r = mid
        
        return l
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`