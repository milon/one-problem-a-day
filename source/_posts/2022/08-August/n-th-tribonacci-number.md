---
extends: _layouts.post
section: content
title: N-th tribonacci number
problemUrl: https://leetcode.com/problems/n-th-tribonacci-number/
date: 2022-08-16
categories: [dynamic-programming]
---

This problem is just like fibonacci number, we will first solve it recursively and then memoize it to reduce redundant calculation.

```python
class Solution:
    def tribonacci(self, n: int) -> int:
        def _tribonacci(n: int, memo: dict) -> int:
            if n in memo:
                return memo[n]
            
            if n == 0: return 0
            if n == 1 or n == 2: return 1
            
            memo[n] = _tribonacci(n-1, memo) + _tribonacci(n-2, memo) + _tribonacci(n-3, memo)
            return memo[n]
        
        return _tribonacci(n, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`