---
extends: _layouts.post
section: content
title: Find players with zero or one losses
problemUrl: https://leetcode.com/problems/find-players-with-zero-or-one-losses/
date: 2022-11-28
categories: [array-and-hashmap]
---

We use 3 different hashset to store zero losses, one loss and more than one loss. Then we iterate through the `results` array and update the hashsets accordingly. Finally, we iterate through the `players` array and add the players with zero or one loss to the result.

```python
class Solution:
    def findWinners(self, matches: List[List[int]]) -> List[List[int]]:
        zero, one, more = set(), set(), set()
        for winner, loser in matches:
            if winner not in one and winner not in more:
                zero.add(winner)
            
            if loser in zero:
                zero.remove(loser)
                one.add(loser)
            elif loser in one:
                one.remove(loser)
                more.add(loser)
            elif loser in more:
                continue
            else:
                one.add(loser)
                
        return [sorted(list(zero)), sorted(list(one))]
```

Time complexity: `O(nlog(n))`, n is the number of matches <br/>
Space complexity: `O(n)`