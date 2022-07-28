---
extends: _layouts.post
section: content
title: reconstruct-itinerary
problemUrl: https://leetcode.com/problems/reconstruct-itinerary/
date: 2022-07-28
categories: [graph]
---

Fisrt we will sort our input tickets, so that when we create the adjacency list from it, it will already be sorted. Then we run DFS with backtrack, as it's possile that we go though one edge, but it's not possile to visit all the nodes. When we traverse the graph, we add every visited node to our response. If the path we are currently looking doesn't have a valid path, we remove it from the result.

```python
class Solution:
    def findItinerary(self, tickets: List[List[str]]) -> List[str]:
        graph = {s: collections.deque() for s, d in tickets}
        res = ["JFK"]

        tickets.sort()
        for s, d in tickets:
            graph[s].append(d)

        def dfs(cur):
            if len(res) == len(tickets)+1:
                return True
            if cur not in graph:
                return False

            temp = list(graph[cur])
            for d in temp:
                graph[cur].popleft()
                res.append(d)
                if dfs(d):
                    return res
                res.pop()
                graph[cur].append(d)
            return False

        dfs("JFK")
        return res
```

Time Complexity: `O(E^2)`, E is the number of edges. <br/>
Space Complexity: `O(E)`