---
extends: _layouts.post
section: content
title: Strictly palindromic number
problemUrl: https://leetcode.com/problems/strictly-palindromic-number/
date: 2022-09-27
categories: [math-and-geometry]
---

We can convert the number to it's base, and check whether it's a palindromic string or not, and return the result.

```python
class Solution:
    def isStrictlyPalindromic(self, n: int) -> bool:
        def convertToBase(base, n):
            result = ''
            while n != 0:
                result += str(n % base)
                n //= base
            return result
        
        for i in range(2, n-1):
            res = convertToBase(i, n)
            if res != res[::-1]:
                return False
        return True
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`

There is a better way to check, the number n in base (n - 2) is always 12, which is not palindromic. So, it will be false in every case, so we can just return false from the function.

```python
class Solution:
    def isStrictlyPalindromic(self, n: int) -> bool:
        return False
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`
