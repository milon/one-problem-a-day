---
extends: _layouts.post
section: content
title: N-queens II
problemUrl: https://leetcode.com/problems/n-queens-ii/
date: 2022-10-04
categories: [backtracking]
---

We will have 3 different sets, one for the column, one for positive diagonal and one for negative diagonal. We will iterate over the each row, and try to add the queen in the board. If this is already in either of the 3 sets, then we continue to the next position. After placing it to every possible position, we return the result.

```python
class Solution:
    def totalNQueens(self, n: int) -> int:
        col = set()
        posDiag = set()
        negDiag = set()

        self.res = 0
        board = [["."] * n for _ in range(n)]

        def backtrack(r: int) -> None:
            if r == n:
                self.res += 1
                return

            for c in range(n):
                if c in col or (r+c) in posDiag or (r-c) in negDiag:
                    continue

                col.add(c)
                posDiag.add(r+c)
                negDiag.add(r-c)
                board[r][c] = "Q"

                backtrack(r+1)

                col.remove(c)
                posDiag.remove(r+c)
                negDiag.remove(r-c)
                board[r][c] = "."

        backtrack(0)
        return self.res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`