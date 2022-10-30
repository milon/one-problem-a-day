---
extends: _layouts.post
section: content
title: Shortest path in a grid with obstacles elimination
problemUrl: https://leetcode.com/problems/shortest-path-in-a-grid-with-obstacles-elimination/
date: 2022-10-30
categories: [graph]
---

We will use a queue to store the nodes that we need to visit. We will also use a set to store the nodes that we have already visited. We will traverse the grid in a breadth-first manner. If the current node is equal to the destination node, then we will return the current node's distance. If the current node is not equal to the destination node, then we will add the current node's neighbors to the queue. We will also add the current node to the set. We will do this until we find the destination node or the queue is empty. If the queue is empty, then we will return `-1`.

```python
class Solution:
    def shortestPath(self, grid: List[List[int]], k: int) -> int:
        ROWS, COLS = len(grid), len(grid[0])
        
        if ROWS == COLS == 1:
            return 0
        
        q = collections.deque([(0, 0, 0, 0)])
        visited = set()
         
        while q:
            r, c, obstacle, path = q.popleft()
            for dr, dc in ((r+1, c), (r-1, c), (r, c+1), (r, c-1)):
                if 0 <= dr < ROWS and 0 <= dc < COLS:
                    if grid[dr][dc] == 1 and obstacle < k and (dr, dc, obstacle+1) not in visited:
                        visited.add((dr, dc, obstacle + 1))
                        q.append((dr, dc, obstacle+1, path+1))
                    if grid[dr][dc] == 0 and (dr, dc, obstacle) not in visited:    
                        if (dr, dc) == (ROWS-1, COLS-1):
                            return path+1
                        visited.add((dr, dc, obstacle))
                        q.append((dr, dc, obstacle, path+1))
                   
        return -1
```

Time complexity: `O(mn)` <br/>
Space complexity: `O(mn)`