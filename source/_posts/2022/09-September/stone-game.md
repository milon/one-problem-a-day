---
extends: _layouts.post
section: content
title: Stone game
problemUrl: https://leetcode.com/problems/stone-game/
date: 2022-09-16
categories: [dynamic-programming]
---

When the piles remaining are piles[i], piles[i+1], ..., piles[j], the player who's turn it is has at most 2 moves.

The person who's turn it is can be found by comparing j-i to N modulo 2.

If the player is Alice, then she either takes piles[i] or piles[j], increasing her score by that amount. Afterwards, the total score is either piles[i] + dp(i+1, j), or piles[j] + dp(i, j-1); and we want the maximum possible score.

If the player is Bob, then he either takes piles[i] or piles[j], decreasing Alice's score by that amount. Afterwards, the total score is either -piles[i] + dp(i+1, j), or -piles[j] + dp(i, j-1); and we want the minimum possible score.

```python
class Solution:
    def stoneGame(self, piles: List[int]) -> bool:
        def dp(i, j, memo):
            if (i, j) in memo:
                return memo[(i, j)]
            
            if i > j:
                return 0
            
            parity = (j-i-len(piles)) % 2
            
            if parity == 1:     #first player
                memo[(i, j)] = max(piles[i] + dp(i+1, j, memo), piles[j] + dp(i, j-1, memo))
            else:   # second player
                memo[(i, j)] = min(-piles[i] + dp(i+1, j, memo), -piles[j] + dp(i, j-1, memo))
            
            return memo[(i, j)]
            
        return dp(0, len(piles)-1, {}) > 0
```

Time Complexity: `O(n^2)`
Space Complexity: `O(n^2)`