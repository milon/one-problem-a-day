---
extends: _layouts.post
section: content
title: Furthest building you can reach
problemUrl: https://leetcode.com/problems/furthest-building-you-can-reach/
date: 2022-08-30
categories: [heap]
---

We will take the ladders for the longest obstackles. First we take the obstackles in a heap, then take the smallest, if the diff is less than or equals to the bricks, we take the bricks, else we take the ladder. That means, we are already in the place where we can't go further, so we return that index. If we could iterate over the entire length, the we return the last index.

```python
class Solution:
    def furthestBuilding(self, heights: List[int], bricks: int, ladders: int) -> int:
        n = len(heights)
        q = []
        for i in range(n-1):
            diff = heights[i+1] - heights[i]
            if diff <= 0:
                continue
            if len(q) == ladders:
                heapq.heappush(q, diff)
                
                smallest_cost = heapq.heappop(q)
                bricks -= smallest_cost
                
                if bricks < 0:
                    return max(0, i)
                
            elif len(q) < ladders:
                heapq.heappush(q, diff)
                
            else:
                return max(0, i)
        return n-1
```

Time Complexity: `O(nlog(l))`, n is the number of building, l is the number of ladders <br/>
Space Complexity: `O(l)`