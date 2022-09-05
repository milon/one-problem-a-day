---
extends: _layouts.post
section: content
title: Battleships in a board
problemUrl: https://leetcode.com/problems/battleships-in-a-board/
date: 2022-09-05
categories: [graph]
---

We will run DFS to explore all the values after we found one `X` and mark that as visited and count the number of battleship by 1. After traverse the whole board, we will return the count as result.

```python
class Solution:
    def countBattleships(self, board: List[List[str]]) -> int:
        ROWS, COLS = len(board), len(board[0])
        visited = set()
        
        def dfs(r: int, c: int) -> int:
            if r<0 or r>=ROWS or c<0 or c>=COLS or (r,c) in visited or board[r][c] == ".":
                return 0
            
            visited.add((r, c))
            dfs(r+1, c)
            dfs(r-1, c)
            dfs(r, c+1)
            dfs(r, c-1)
            return 1
        
        count = 0
        for r in range(ROWS):
            for c in range(COLS):
                if board[r][c] == "X" and (r, c) not in visited:
                    count += dfs(r, c)
        
        return count
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`