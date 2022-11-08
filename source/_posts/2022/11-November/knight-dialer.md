---
extends: _layouts.post
section: content
title: Knight dialer
problemUrl: https://leetcode.com/problems/knight-dialer/
date: 2022-11-08
categories: [dynamic-programming]
---

We will create a DAG to represent the possible moves of the knight. We will then create a 2D array to represent the number of ways to reach a particular node. We will then iterate over the array and update the number of ways to reach the next node. We will return the sum of the last row of the array.

```python

```python
class Solution:
    possible_moves = {
        0: [4,6],
        1: [6,8],
        2: [7,9],
        3: [4,8],
        4: [0,3,9],
        5: [],
        6: [0,1,7],
        7: [2,6],
        8: [1,3],
        9: [2,4],
    }
    
    MOD = 10**9+7
        
    def knightDialer(self, n: int) -> int:
        return int(sum(self.dp(start, n-1) for start in range(10)) % self.MOD)
    
    @lru_cache(maxsize=None)
    def dp(self, start: int, n: int) -> int:
        if n == 0:
            return 1
        
        return sum(self.dp(next_move, n-1) for next_move in self.possible_moves[start]) % self.MOD
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`