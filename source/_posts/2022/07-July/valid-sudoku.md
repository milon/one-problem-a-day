---
extends: _layouts.post
section: content
title: Valid sudoku
problemUrl: https://leetcode.com/problems/valid-sudoku/
date: 2022-07-13
categories: [array-and-hashmap]
---

We can use 3 hashmap to store the values of rows, colums and square. For rows and columns hashmap we will use the row and column number as key. For square hashmap, we can use the integer division of the row, column value by 3, and use the set as key. For example, row 5 and column 4 value will be stored as `(row//3, column//3)` key in the hashmap. If we already have the value stored in the hashmap, then we return false immediately. If we can traverse through the whole grid without any duplicate, that mean the sudoku is valid and we return true.

```python
import collections
from typing import List

class Solution:
    def isValidSudoku(self, board: List[List[str]]) -> bool:
        rows = collections.defaultdict(set)
        cols = collections.defaultdict(set)
        sqrs = collections.defaultdict(set)

        for r in range(9):
            for c in range(9):
                if board[r][c] == '.':
                    continue
                if (board[r][c] in rows[r] or
                    board[r][c] in cols[c] or
                        board[r][c] in sqrs[(r//3, c//3)]):
                    return False
                rows[r].add(board[r][c])
                cols[c].add(board[r][c])
                sqrs[(r//3, c//3)].add(board[r][c])

        return True
```

We go through the whole grid once, so time complexity should be O(n). Similarly the space complexity should be O(n^3). But as we are given a 9X9 grid, it's a constant time and space operation. So both time and space complexity will be `O(1)`.