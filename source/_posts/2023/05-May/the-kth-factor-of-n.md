---
extends: _layouts.post
section: content
title: The kth factor of n
problemUrl: https://leetcode.com/problems/the-kth-factor-of-n/
date: 2023-05-19
categories: [math-and-geometry]
---

We can iterate through the numbers from 1 to n and check if the number is a factor of n. If it is, we decrement k by 1. If k is 0, we return the number.

```python
class Solution:
    def kthFactor(self, n: int, k: int) -> int:
        for i in range(1, n//2 + 1):
            if n % i == 0:
                k -= 1
                if k == 0:
                    return i
        
        return n if k == 1 else -1
```

Time complexity: `O(n)` where n is the value of n. <br/>
Space complexity: `O(1)`
