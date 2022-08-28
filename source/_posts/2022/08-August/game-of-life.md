---
extends: _layouts.post
section: content
title: Game of life
problemUrl: https://leetcode.com/problems/game-of-life/
date: 2022-08-28
categories: [array-and-hashmap]
---

We will create a copy of the given matrix, also create a helper function to count the live neighbors. Then, we iterate over each element of the board, count it's live neighbors, then change the value of the board according to the rule of the game.

```python
class Solution:
    def gameOfLife(self, board: List[List[int]]) -> None:
        ROWS, COLS = len(board), len(board[0])
        state = [x.copy() for x in board]
        
        def countLiveNeighbor(r: int, c: int) -> int:
            offsets = [(-1,-1), (-1,0), (-1,1), (0,-1), (0,1), (1,-1), (1,0), (1,1)]
            count = 0
            for dr, dc in offsets:
                row, col = r+dr, c+dc
                if row<0 or row >=ROWS or col<0 or col>=COLS:
                    continue
                if state[row][col] == 1:
                    count += 1
            return count
        
        for r in range(ROWS):
            for c in range(COLS):
                liveCount = countLiveNeighbor(r, c)
                
                if liveCount < 2 or liveCount > 3:
                    board[r][c] = 0
                elif liveCount == 2:
                    continue
                elif liveCount == 3:
                    if state[r][c] == 0:
                        board[r][c] = 1
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`