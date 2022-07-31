---
extends: _layouts.post
section: content
title: Sum of two integers
problemUrl: https://leetcode.com/problems/sum-of-two-integers/
date: 2022-07-31
categories: [math-and-geometry]
---

We know, `2^a + 2^b = 2^(a+b)` and `log2(2^a) = a`. We can use this two formula to sum 2 numbers without using `+`. 

```python
class Solution:
    def getSum(self, a: int, b: int) -> int:
        fact1 = math.pow(2, a)  # 2^a
        fact2 = math.pow(2, b)  # 2^b
        prod = fact1 * fact2    # 2^a * 2^b = 2^(a+b)
        ans = math.log2(prod)   # log2(2^(a+b)) = a+b
        
        return int(ans)
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`