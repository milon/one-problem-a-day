---
extends: _layouts.post
section: content
title: Climbing stairs
problemUrl: https://leetcode.com/problems/climbing-stairs/
date: 2022-07-31
categories: [dynamic-programming]
---

We will first solve it in recursive brute force, the use memoization to make it efficient. If the number of stairs is less than or equal to 1, then we can climb the stair with 1 step, this will be our base case. And we can take at most 2 steps, so we can either take 1 step or 2 step at a time, this will be our recursive call.

```python
class Solution:
    def climbStairs(self, n: int) -> int:
        def _climbStairs(n: int, memo: dict) -> int:
            if n in memo:
                return memo[n]
            if n <= 1:
                return 1
            
            memo[n] = _climbStairs(n-1, memo) + _climbStairs(n-2, memo)
            return memo[n]
        
        return _climbStairs(n, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`