---
extends: _layouts.post
section: content
title: Perfect number
problemUrl: https://leetcode.com/problems/perfect-number/
date: 2022-12-27
categories: [math-and-geometry]
---

We will find all the divisors of the number and then sum them up. If the sum is equal to the number, then it is a perfect number.

```python
class Solution:
    def checkPerfectNumber(self, num: int) -> bool:
        if num <= 1:
            return False
        divisorSum = 1
        for i in range(2, int(sqrt(num)) + 1):
            if num % i == 0:
                divisorSum += i
                divisorSum += num // i
        return divisorSum == num
```

Time complexity: `O(sqrt(n))` <br/>
Space complexity: `O(1)`