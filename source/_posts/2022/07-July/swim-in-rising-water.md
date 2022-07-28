---
extends: _layouts.post
section: content
title: Swim in rising water
problemUrl: https://leetcode.com/problems/swim-in-rising-water/
date: 2022-07-28
categories: [dynamic-programming]
---

We will apply Dijkstra's greedy algorithm to solve this problem. It's basically a BFS traversal, but rather than use a regular queue, we will use a minimum heap aka. priority queue to pop from the queue. In the process we will store the maximum value of the grid's current position. After we reach the target position, that means the last position of the grid, we will return the maximum value.

```python
class Solution:
    def swimInWater(self, grid: List[List[int]]) -> int:
        N = len(grid)
        visit = set()
        minHeap = [(grid[0][0], 0, 0)]
        directions = [(0, 1), (0, -1), (1, 0), (-1, 0)]

        visit.add((0, 0))
        while minHeap:
            time, r, c = heapq.heappop(minHeap)
            if r == N - 1 and c == N - 1:
                return time
            for dr, dc in directions:
                row, col = r + dr, c + dc
                if (
                    row < 0
                    or col < 0
                    or row >= N
                    or col >= N
                    or (row, col) in visit
                ):
                    continue

                visit.add((row, col))
                heapq.heappush(minHeap, (max(time, grid[row][col]), row, col))
```

Time Complexity: `O(n^2 * log(n))`, n is the number of elements in the grid. <br/>
Space Complexity: `O(n)`