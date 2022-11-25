---
extends: _layouts.post
section: content
title: Find greatest common divisor of array
problemUrl: https://leetcode.com/problems/find-greatest-common-divisor-of-array/
date: 2022-11-25
categories: [mathp-and-geometry]
---

We can solve the problem by using Euclidean algorithm. We will find the greatest common divisor of the first two numbers in the array. Then we will find the greatest common divisor of the greatest common divisor and the next number in the array. We will repeat this process until we reach the end of the array.

```python
class Solution:
    def findGCD(self, nums: List[int]) -> int:
        def gcd(a, b):
            if b == 0:
                return a
            return gcd(b, a % b)
        return gcd(min(nums), max(nums))
```

Time complexity: `O(nlog(n))`, n is the length of nums <br/>
Space complexity: `O(1)`
