---
extends: _layouts.post
section: content
title: Shopping offers
problemUrl: https://leetcode.com/problems/shopping-offers/
date: 2022-11-20
categories: [dynamic-programming]
---

We can use DFS with memoization to solve this problem. We will keep track of the current state of the shopping list. Then we will iterate over each offer and we will check if the offer is valid. If yes, we will apply the offer and we will recursively call the function with the new state of the shopping list. We will continue this process until we reach the end of the offers. Then we will calculate the minimum cost of the shopping list without any offer.

```python
class Solution:
    def shoppingOffers(self, price: List[int], special: List[List[int]], needs: List[int]) -> int:
        def dfs(needs, memo):
            if tuple(needs) in memo:
                return memo[tuple(needs)]

            res = sum(needs[i] * price[i] for i in range(len(needs)))
            for offer in special:
                new_needs = [needs[i] - offer[i] for i in range(len(needs))]
                if min(new_needs) >= 0:
                    res = min(res, offer[-1] + dfs(new_needs, memo))
            memo[tuple(needs)] = res
            return res
        
        return dfs(needs, {})
```

Time complexity: `O(n^m)` <br/>
Space complexity: `O(n^m)`