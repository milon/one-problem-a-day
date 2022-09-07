---
extends: _layouts.post
section: content
title: Keys and rooms
problemUrl: https://leetcode.com/problems/keys-and-rooms/
date: 2022-09-07
categories: [graph]
---

We will create a set with all the nodes. First we put them in unvisited set. Then we start traversing the graph using BFS and remove nodes from unvisited set after every node visit. Finally when the traversing is done, if the unvisited set is empty that means we will be able to visit every room and we return true, else we return false.

```python
class Solution:
    def canVisitAllRooms(self, rooms: List[List[int]]) -> bool:
        q = collections.deque([0])
        unvisited = set([n for n in range(len(rooms))])
        
        while q:
            node = q.pop()
            if node in unvisited:
                unvisited.remove(node)
                q.extendleft(rooms[node])
        
        return not unvisited
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`