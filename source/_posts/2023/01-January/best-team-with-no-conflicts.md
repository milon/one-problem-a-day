---
extends: _layouts.post
section: content
title: Best team with no conflicts
problemUrl: https://leetcode.com/problems/best-team-with-no-conflicts/
date: 2023-01-31
categories: [dynamic-programming]
---

We will sort the players by their score, and then we will iterate over the players and for each player we will find the best team that can be formed by including the current player. We will use a dynamic programming approach to solve this problem. We will use a `dp` array to store the best team score that can be formed by including the current player. We will iterate over the players and for each player we will iterate over the players before the current player and check if the current player can be included in the team formed by the previous player. If the current player can be included in the team formed by the previous player, we will update the `dp` array for the current player. The final answer will be the maximum value in the `dp` array.

```python
class Solution:
    def bestTeamScore(self, scores: List[int], ages: List[int]) -> int:
        players = sorted(zip(ages, scores))
        dp = [0] * len(players)
        for i, (age, score) in enumerate(players):
            dp[i] = score
            for j in range(i):
                if players[j][1] <= score:
                    dp[i] = max(dp[i], dp[j] + score)
        return max(dp)
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(n)`

We can achive the same thing with top-down approach.

```python
class Solution:
    def bestTeamScore(self, scores: List[int], ages: List[int]) -> int:
        ages, scores = zip(*sorted(zip(ages, scores)))
        
        @lru_cache(None)
        def fn(i): 
            return scores[i] + max((fn(ii) for ii in range(i) if ages[ii] == ages[i] or scores[ii] <= scores[i]), default=0)
        
        return max(fn(i) for i in range(len(scores)))
```
