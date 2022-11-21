---
extends: _layouts.post
section: content
title: Nearest exit from entrance in maze
problemUrl: https://leetcode.com/problems/nearest-exit-from-entrance-in-maze/
date: 2022-11-21
categories: [graph]
---

We will start from the entrance, run BFS through the matrix and find the nearest exit. If we can't find the exit, we will return `-1`.

```python
class Solution:
    def nearestExit(self, maze: List[List[str]], entrance: List[int]) -> int:
        ROWS, COLS = len(maze), len(maze[0])
        
        directions = [(0, 1), (1, 0), (0, -1), (-1, 0)]
        visited = set([tuple(entrance)])
        q = collections.deque([tuple(entrance)])
        
        steps = 0
        while q:
            qLen = len(q)
            for _ in range(qLen):
                r, c = q.pop()
                if (0 in [r, c] or r == ROWS-1 or c == COLS-1) and [r, c] != entrance:
                    return steps
                for dr, dc in directions:
                    x, y = r+dr, c+dc
                    if 0<=x<ROWS and 0<=y<COLS and maze[x][y] == '.' and (x, y) not in visited:
                        visited.add((x,y))
                        q.appendleft((x,y))
            steps += 1
        
        return -1
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`