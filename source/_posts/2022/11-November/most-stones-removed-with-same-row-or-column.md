---
extends: _layouts.post
section: content
title: Most stones removed with same row or column
problemUrl: https://leetcode.com/problems/most-stones-removed-with-same-row-or-column/
date: 2022-11-14
categories: [graph]
---

We will create 2 adjacency list from the stones and then we will use BFS to find the connected components. The answer is the number of stones - the number of connected components.

```python
class Solution:
    def removeStones(self, stones: List[List[int]]) -> int:
        graphX = collections.defaultdict(list)
        graphY = collections.defaultdict(list)
        for x, y in stones:
            graphX[x].append(y)
            graphY[y].append(x)
        
        connected = 0
        visited = set()
        for x, y in stones:
            if (x, y) not in visited:
                q = collections.deque([(x, y)])
                while q:
                    qLen = len(q)
                    for _ in range(qLen):
                        x0, y0 = q.pop()
                        if (x0, y0) not in visited:
                            visited.add((x0, y0))
                            for neiY in graphX[x0]:
                                q.appendleft((x0, neiY))
                            for neiX in graphY[y0]:
                                q.appendleft((neiX, y0))
                connected += 1
        
        return len(stones) - connected
```

Time complexity: `O(n)` <br>
Space complexity: `O(n)`