---
extends: _layouts.post
section: content
title: Game of nim
problemUrl: https://leetcode.com/problems/game-of-nim/
date: 2023-01-29
categories: [bit-manipulation]
---

We will calculate the XOR sum of all the piles, and check whether it's zero or not. For non zero value player 1 wins, otherwise player 2 wins.

```python
class Solution:
    def nimGame(self, piles: List[int]) -> bool:
        nim_sum = 0
        for p in piles:
            nim_sum ^= p
        return nim_sum != 0
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`