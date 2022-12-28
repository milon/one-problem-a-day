---
extends: _layouts.post
section: content
title: Design a leaderboard
problemUrl: https://leetcode.com/problems/design-a-leaderboard/
date: 2022-12-28
categories: [array-and-hashmap, design]
---

We will use a hashmap to store the score of each player. We will store the score of each player and we can look up in constant time.

```python
class Leaderboard:
    def __init__(self):
        self.store = collections.Counter()

    def addScore(self, playerId: int, score: int) -> None:
        self.store[playerId] += score

    def top(self, K: int) -> int:
        return sum(v for i,v in self.store.most_common(K))

    def reset(self, playerId: int) -> None:
        self.store[playerId] = 0

# Your Leaderboard object will be instantiated and called as such:
# obj = Leaderboard()
# obj.addScore(playerId,score)
# param_2 = obj.top(K)
# obj.reset(playerId)
```

Time complexity: `O(1)` for `addScore` and `reset` and `O(nlog(n))` for `top` <br/>
Space complexity: `O(n)`