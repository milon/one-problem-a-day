---
extends: _layouts.post
section: content
title: Minesweeper
problemUrl: https://leetcode.com/problems/minesweeper/
date: 2022-10-26
categories: [graph]
---

We will run a DFS on the grid and return the number of mines adjacent to the cell if the cell is not a mine. Otherwise, we will return 'X' and mark the cell as visited.

```python
class Solution:
    def updateBoard(self, board: List[List[str]], click: List[int]) -> List[List[str]]:
        ROWS, COLS = len(board), len(board[0])
        
        def dfs(r, c):
            count = 0 
            for (i, j) in ((0, 1), (1, 0), (0, -1), (-1, 0), (-1, -1), (-1, 1), (1, -1), (1, 1)):
                if (0 <= r+i < ROWS) and (0 <= c+j < COLS) and board[r+i][c+j] == "M":
                    count += 1
            if count != 0:
                board[r][c] = str(count)
            else:
                board[r][c] = "B"
                for (dr, dc) in ((0, 1), (1, 0), (0, -1), (-1, 0), (-1, -1), (-1, 1), (1, -1), (1, 1)):
                    if (0 <= r+dr < ROWS) and (0 <= c+dc < COLS) and board[r+dr][c+dc] == "E":
                        dfs(r+dr, c+dc)
                        
        if board[click[0]][click[1]] == "M":
            board[click[0]][click[1]] = "X"
        else:
            dfs(click[0], click[1])
            
        return board
```

Time complexity: O(n^2) <br/>
Space complexity: O(1)