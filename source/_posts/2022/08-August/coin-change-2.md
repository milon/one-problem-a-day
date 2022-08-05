---
extends: _layouts.post
section: content
title: Coin change 2
problemUrl: https://leetcode.com/problems/coin-change-2/
date: 2022-08-05
categories: [dynamic-programming]
---

We will first solve the problem with brute force using recursion. Then we use memoization to reduce it's complexity.

```python
class Solution:
    def change(self, amount: int, coins: List[int]) -> int:
        def _change(pos, amount, memo):
            if (pos, amount) in memo:
                return memo[(pos, amount)]
            
            if pos == len(coins) or amount <= 0:
                return 1 if amount == 0 else 0
            
            take = _change(pos, amount-coins[pos], memo)
            skip = _change(pos+1, amount, memo)
            memo[(pos, amount)] = take + skip
            
            return memo[(pos, amount)]
        
        return _change(0, amount, {})
```

Time Complexity: `O(n*a)`, n is the number of coins, a is the amount of money <br/>
Space Complexity: `O(n*a)`