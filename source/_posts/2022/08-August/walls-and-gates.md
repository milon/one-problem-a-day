---
extends: _layouts.post
section: content
title: Walls and gates
problemUrl: https://leetcode.com/problems/walls-and-gates/
date: 2022-08-12
categories: [graph]
---

We will run a BFS from every getes, and on the process we will replace every infinity value with the distance. Whenever we hit an obstacke, we will skip that.

```python
class Solution:
    def walls_and_gates(self, rooms: List[List[int]]) -> None:
        ROWS, COLS = len(rooms), len(rooms[0])
        visited = set()
        queue = collections.deque()

        def addRooms(r, c):
            if (
                r < 0
                or c < 0
                or r == ROWS
                or c == COLS
                or (r, c) in visited
                or rooms[r][c] == -1
            ):
                return
            visited.add((r, c))
            queue.append([r, c])

        for r in range(ROWS):
            for c in range(COLS):
                if rooms[r][c] == 0:
                    visited.add((r, c))
                    queue.append([r, c])

        dist = 0
        while queue:
            qLength = len(queue)
            for i in range(qLength):
                r, c = queue.popleft()
                rooms[r][c] = dist
                addRooms(r + 1, c)
                addRooms(r - 1, c)
                addRooms(r, c + 1)
                addRooms(r, c - 1)
            dist += 1
```

Time Complexity: `O(n*m)`, n is the number of rows and m is the number of coulmns in the grid.
Space Complexity: `O(n*m)`