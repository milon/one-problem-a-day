---
extends: _layouts.post
section: content
title: Meeting rooms III
problemUrl: https://leetcode.com/problems/meeting-rooms-iii/
date: 2022-11-26
categories: [intervals, heap]
---

Ready contains the ready room index for meetings. Rooms contains the rooms in use with [end_time, room_index] as element.

For [start, end] in the sorted meetings, we firstly release the rooms that is ready before start time. If there is room in ready state, we choose the room with smallest index. Otherwise, we choose the room with smallest end_time in rooms.

```python
class Solution:
    def mostBooked(self, n: int, meetings: List[List[int]]) -> int:
        ready = [r for r in range(n)]
        rooms = []
        heapq.heapify(ready)
        res = [0] * n
        
        for s,e in sorted(meetings):
            while rooms and rooms[0][0] <= s:
                t, r = heappop(rooms)
                heappush(ready, r)
            if ready:
                r = heappop(ready)
                heappush(rooms, [e, r])
            else:
                t, r = heappop(rooms)
                heappush(rooms, [t+e-s, r])
            res[r] += 1
        
        return res.index(max(res))
```
