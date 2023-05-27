---
extends: _layouts.post
section: content
title: Stone game II
problemUrl: https://leetcode.com/problems/stone-game-ii/
date: 2023-05-27
categories: [dynamic-programming]
---

We can use top-down dynamic programming to solve the problem. First we will calculate the suffix sum of the piles. Then we will use two pointers `i` and `m` to iterate over the piles and the number of stones that can be taken respectively. If `i+(2*m) >= n`, we will return the sum of the remaining piles. Otherwise, we will take the maximum of the result of the current player and the result of the other player. Finally, we will return the result of the first player. We will use a hashmap to store the results of the subproblems.

```python
class Solution:
    def stoneGameII(self, piles: List[int]) -> int:
        n = len(piles)
        
        for i in range(n - 2, -1, -1):
            piles[i] += piles[i+1]
        
        def dp(i, m, memo):
            if (i, m) in memo:
                return memo[(i, m)]
            
            if i+(2*m) >= n:
                return piles[i]
            
            memo[(i, m)] = piles[i] - min(dp(i+x, max(x, m), memo) for x in range(1, 2*m+1))
            return memo[(i, m)]
        
        return dp(0, 1, {})
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n^2)`