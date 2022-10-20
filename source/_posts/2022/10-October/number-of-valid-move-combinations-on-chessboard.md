---
extends: _layouts.post
section: content
title: Number of valid move combinations on chessboard
problemUrl: https://leetcode.com/problems/number-of-valid-move-combinations-on-chessboard/
date: 2022-10-20
categories: [backtracking]
---

We will simulate the solution, using a set to store the positions and then traverse through each possible position with a DFS and backtrack if we don't find a valid position.

```python
class Solution:
    def countCombinations(self, pieces: List[str], positions: List[List[int]]) -> int:
        n = len(pieces)
        rookDir = [(1, 0), (-1, 0), (0, 1), (0, -1)]
        bishopDir = [(1, 1), (1, -1), (-1, 1), (-1, -1)]
        dirsChoices = {"rook": rookDir, "bishop": bishopDir, "queen": rookDir+bishopDir}
        ans = set()

        def hash(board: List[List[int]]) -> Tuple:
            return tuple([tuple(pos) for pos in board])

        def dfs(board: List[List[int]], dirs: List[Tuple[int, int]], activeMask: int) -> None:
            ans.add(hash(board))
            for nextActiveMask in range(1, 1 << n):
                if activeMask & nextActiveMask != nextActiveMask:
                    continue

                # make sure to copy every pos!
                nextBoard = [pos.copy() for pos in board]

                # move pieces that are active in this turn
                for i in range(n):
                    if (nextActiveMask >> i) & 1:
                        nextBoard[i][0] += dirs[i][0]
                        nextBoard[i][1] += dirs[i][1]

                # check no two or more pieces occupy the same square
                if len(set(hash(nextBoard))) < len(nextBoard):
                    continue

                # check if all in boundary
                if all(1 <= x <= 8 and 1 <= y <= 8 for x, y in nextBoard):
                    dfs(nextBoard, dirs, nextActiveMask)

        for dirs in product(*(dirsChoices[piece] for piece in pieces)):
            dfs(positions, dirs, (1 << n) - 1)

        return len(ans)
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n^2)`