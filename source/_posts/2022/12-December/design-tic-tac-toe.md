---
extends: _layouts.post
section: content
title: Design tic tac toe
problemUrl: https://leetcode.com/problems/design-tic-tac-toe/
date: 2022-12-07
categories: [design]
---

We will use a hash map to store the number of times a row, column, or diagonal has been filled by a player. We will also use a variable to store the number of moves made. If the number of moves is equal to the total number of cells, then the game is a draw.

```python
class TicTacToe:

    def __init__(self, n: int):
        self.count = collections.Counter()
        self.n = n

    def move(self, row: int, col: int, player: int) -> int:
        for i, x in enumerate((row, col, row+col, row-col)):
                self.count[(i, x, player)] += 1
                if self.count[(i, x, player)] == self.n:
                    return player
        return 0

# Your TicTacToe object will be instantiated and called as such:
# obj = TicTacToe(n)
# param_1 = obj.move(row,col,player)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n^2)`