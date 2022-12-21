---
extends: _layouts.post
section: content
title: Possible bipartition
problemUrl: https://leetcode.com/problems/possible-bipartition/
date: 2022-12-21
categories: [graph]
---

We will create an adjacency list from the dislikes list. Then we start traversing the graph with BFS, and for each alternate level, we will assign one color. If two adjacent node has the same color, then we immediately return false. If we can traverse the whole graph, then we return true.

```python
class Solution:
    def possibleBipartition(self, n: int, dislikes: List[List[int]]) -> bool:
        graph = {p: [] for p in range(1, n+1)}
        for p1, p2 in dislikes:
            graph[p1].append(p2)
            graph[p2].append(p1)

        visited = set()
        for person in range(1, n+1):
            if person not in visited:
                groups = [set([person]), set()]
                curList = [person]
                level = 0

                while curList:
                    next = []
                    curGroup = groups[level % 2]
                    theOtherGroup = groups[(level+1) % 2]
                    
                    for p in curList:
                        visited.add(p)
                        for neighbor in graph[p]:
                            # if the neighbor is already in the same group of this person
                            if neighbor in curGroup:
                                return False

                            if neighbor not in theOtherGroup:
                                theOtherGroup.add(neighbor)
                                next.append(neighbor)

                    curList = next
                    level += 1
        
        return True
```

Time complexity: `O(n+m)` where `n` is the number of people and `m` is the number of dislikes. <br/>
Space complexity: `O(n+m)`
