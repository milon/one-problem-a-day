---
extends: _layouts.post
section: content
title: K highest ranked items within a price range
problemUrl: https://leetcode.com/problems/k-highest-ranked-items-within-a-price-range/
date: 2023-01-02
categories: [heap, graph]
---

We will use a heap to store the top `k` items. We will iterate over the items and for each item we will check if the price is within the price range. If it is, we will check if the heap size is less than `k`. If it is, we will push the item to the heap. Otherwise, we will check if the price of the item is greater than the price of the item at the top of the heap. If it is, we will pop the item at the top of the heap and push the current item to the heap. Finally, we will return the items in the heap.

```python

class Solution:
    def highestRankedKItems(self, grid: List[List[int]], pricing: List[int], start: List[int], k: int) -> List[List[int]]:
        ROWS, COLS = len(grid), len(grid[0])
        
        queue, res = [], []
        heapq.heappush(queue, (0, 0, start[0], start[1])) # dist, price, row, col
        seen = set()
        
        while queue and k > 0:
            dist, price, cx, cy = heapq.heappop(queue)
            
            if (cx, cy) in seen:
                continue
            seen.add((cx, cy))
            
            if pricing[0] <= grid[cx][cy] <= pricing[1]:
                k -= 1
                res.append([cx, cy])
            
            for dx, dy in [(0, 1), (0, -1), (1, 0), (-1, 0)]:
                nx = dx + cx
                ny = dy + cy
                
                if nx < 0 or nx >= ROWS or ny < 0 or ny >= COLS or grid[nx][ny] == 0 or (nx, ny) in seen:
                    continue
                
                heapq.heappush(queue, (dist+1,  grid[nx][ny], nx, ny))
            
        return res
```

Time complexity: `O(mnlog(mn))`, m is the number of rows and n is the number of columns in the grid <br/>
Space complexity: `O(mn)`