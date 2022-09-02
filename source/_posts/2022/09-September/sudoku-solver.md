---
extends: _layouts.post
section: content
title: Sudoku solver
problemUrl: https://leetcode.com/problems/sudoku-solver/
date: 2022-09-02
categories: [backtracking]
---

We will use 3 hashset to store the value of rows, columns and boxes. For rows and columns hashset we will use the row and column number as key. For square hashset, we can use the integer division of the row, column value by 3, and use the set as key. For example, row 5 and column 4 value will be stored as (row//3, column//3) key in the hashset. First we iterate over the board, added the existing numbers to the hashsets. Then we start solving them using DFS, if we can't go with a number because they are already in one of 3 hashsets, we backtrack and mmove to the next number. If we find a poisition, we repalce the `.` with the number. As we are guranteed to have a unique solution, when the backtracking DFS function is done, our algorithm is also done, we don't have to return anything.

```python
class Solution:
    def solveSudoku(self, board: List[List[str]]) -> None:
        N = 9
        ROWS = {r: set() for r in range(N)}
        COLS = {c: set() for c in range(N)}
        BOXES = {(r,c): set() for r in range(3) for c in range(3)}
        
        for r in range(N):
            for c in range(N):
                if board[r][c] != '.':
                    ROWS[r].add(int(board[r][c]))
                    COLS[c].add(int(board[r][c]))
                    BOXES[(r//3, c//3)].add(int(board[r][c]))
        
        def getNextEmptyPosition():
            for r in range(N):
                for c in range(N):
                    if board[r][c] == '.':
                        return r, c
            return None, None
        
        def backtrack():
            r, c = getNextEmptyPosition()
            
            if r is None and c is None:
                return True
            
            for num in range(1, 10):
                if num not in ROWS[r] and num not in COLS[c] and num not in BOXES[(r//3, c//3)]:
                    ROWS[r].add(num)
                    COLS[c].add(num)
                    BOXES[(r//3, c//3)].add(num)
                    
                    board[r][c] = str(num)
                    if backtrack():
                        return True
                    
                    board[r][c] = '.'
                    ROWS[r].remove(num)
                    COLS[c].remove(num)
                    BOXES[(r//3, c//3)].remove(num)
            return False
        
        backtrack()
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`