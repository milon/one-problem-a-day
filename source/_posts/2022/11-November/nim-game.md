---
extends: _layouts.post
section: content
title: Nim game
problemUrl: https://leetcode.com/problems/nim-game/
date: 2022-11-30
categories: [math-and-geometry]
---

Let us think of the small cases. It is clear that if there are only one, two, or three stones in the pile, and it is your turn, you can win the game by taking all of them. Like the problem description says, if there are exactly four stones in the pile, you will lose. Because no matter how many you take, you will leave some stones behind for your opponent to take and win the game. So in order to win, you have to ensure that you never reach the situation where there are exactly four stones on the pile on your turn.

Similarly, if there are five, six, or seven stones you can win by taking just enough to leave four stones for your opponent so that they lose. But if there are eight stones on the pile, you will inevitably lose, because regardless whether you pick one, two or three stones from the pile, your opponent can pick three, two or one stone to ensure that, again, four stones will be left to you on your turn.

It is obvious that the same pattern repeats itself for n=4,8,12,16,…, basically all multiples of 4.

```python
class Solution:
    def canWinNim(self, n: int) -> bool:
        return n % 4 != 0
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`
