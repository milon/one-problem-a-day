---
extends: _layouts.post
section: content
title: Integer replacement
problemUrl: https://leetcode.com/problems/integer-replacement/
date: 2022-10-28
categories: [dynamic-programming]
---

We will follow the problem statement, and solve it recursively. Then we will memoize the result to avoid repeated computations.

```python
class Solution:
    def integerReplacement(self, n: int) -> int:
        def _calculate(n, memo):
            if n in memo:
                return memo[n]
            
            if n == 1:
                return 0
            
            if n%2 == 0:
                memo[n] = 1 + _calculate(n/2, memo)
            else:
                memo[n] = 1 + min(_calculate(n+1, memo), _calculate(n-1, memo))
            
            return memo[n]
        
        return _calculate(n, {})
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`