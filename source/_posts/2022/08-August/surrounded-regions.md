---
extends: _layouts.post
section: content
title: Surrounded regions
problemUrl: https://leetcode.com/problems/surrounded-regions/
date: 2022-08-11
categories: [graph]
---

We will capture the surrounded reason by running DFS from each position and if it is not surrounded by the `X`, then we turn them into a temporary value `T`. Then after the DFS is done, we iterate over the whole grid one more time and convert all the `O` to `X` and all the `T` to `O`.

```python
class Solution:
    def solve(self, board: List[List[str]]) -> None:
        ROWS, COLS = len(board), len(board[0])
        
        def capture(r, c):
            if (
                r < 0 
                or c < 0 
                or r == ROWS 
                or c == COLS 
                or board[r][c] != "O"
            ):
                return
            board[r][c] = "T"
            capture(r + 1, c)
            capture(r - 1, c)
            capture(r, c + 1)
            capture(r, c - 1)
        
        # (DFS) Capture unsurrounded regions (O -> T)
        for r in range(ROWS):
            for c in range(COLS):
                if (
                    board[r][c] == "O" 
                    and (r in [0, ROWS - 1] or c in [0, COLS - 1])
                ):
                    capture(r, c)
        
        # Capture surrounded regions (O -> X) and (T -> O)
        for r in range(ROWS):
            for c in range(COLS):
                if board[r][c] == "O":
                    board[r][c] = "X"
                elif board[r][c] == "T":
                    board[r][c] = "O"
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`