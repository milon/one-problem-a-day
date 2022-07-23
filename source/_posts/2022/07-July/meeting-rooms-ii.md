---
extends: _layouts.post
section: content
title: Meeting rooms II
problemUrl: https://leetcode.com/problems/meeting-rooms-ii/
date: 2022-07-23
categories: [intervals]
---

We will sort the intervals, then in each iteration we will compare the end of the meeting with the start of the previous meeting. We will keep track of the count for the number of meeting going on, and another running counter to keep track of the max meeting room. After the iteration is done, we return the maximum meeting room.

```python
class Solution:
    def minMeetingRooms(self, intervals: List[List[int]]) -> int:
        start = sorted(intervals, key=lambda x: x[0])
        end = sorted(intervals, key=lambda x: x[1])
        rooms, count = 0, 0
        s, e = 0, 0
        while s < len(intervals):
            if start[s] < end[s]:
                s += 1
                count += 1
            else:
                e += 1
                count -= 1
            rooms = max(rooms, count)
        return rooms
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`