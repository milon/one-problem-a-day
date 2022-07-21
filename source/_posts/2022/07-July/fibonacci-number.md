---
extends: _layouts.post
section: content
title: Fibonacci number
problemUrl: https://leetcode.com/problems/fibonacci-number/
date: 2022-07-21
categories: [dynamic-programming]
---

This is the classing fibonacci number problem. First we solve this using recursion, then we memoize it to increase efficiency.

```python
class Solution:
    def fib(self, n: int) -> int:
        def _fib(n: int, memo: dict):
            if n in memo:
                return memo[n]
            if n == 0 or n == 1:
                return n
            memo[n] = _fib(n-1, memo) + _fib(n-2, memo)
            return memo[n]
        
        return _fib(n, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`