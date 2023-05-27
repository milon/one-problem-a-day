---
extends: _layouts.post
section: content
title: Stone game III
problemUrl: https://leetcode.com/problems/stone-game-iii/
date: 2023-05-27
categories: [dynamic-programming]
---

We can use top-down dynamic programming to solve the problem. We will use two pointers `i` and `m` to iterate over the piles and the number of stones that can be taken respectively. If `i >= n`, we will return 0. Otherwise, we will take the maximum of the result of the current player and the result of the other player. Finally, we will return the result of the first player. We will use a hashmap to store the results of the subproblems.

```python
class Solution:
    def stoneGameIII(self, stoneValue: List[int]) -> str:
        n = len(stoneValue)

        @lru_cache(None)
        def f(i):
            if i == n:
                return 0
            result = stoneValue[i] - f(i + 1)
            if i + 2 <= n:
                result = max(result, stoneValue[i] + stoneValue[i + 1] - f(i + 2))
            if i + 3 <= n:
                result = max(result, stoneValue[i] + stoneValue[i + 1]
                            + stoneValue[i + 2] - f(i + 3))
            return result

        dif = f(0)
        if dif > 0:
            return "Alice"
        if dif < 0:
            return "Bob"
        return "Tie"
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`