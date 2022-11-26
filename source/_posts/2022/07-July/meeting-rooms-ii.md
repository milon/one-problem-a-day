---
extends: _layouts.post
section: content
title: Meeting rooms II
problemUrl: https://leetcode.com/problems/meeting-rooms-ii/
date: 2022-07-23
categories: [intervals, heap]
---

We will sort the intervals, then in each iteration we will compare the end of the meeting with the start of the previous meeting. We will keep track of the count for the number of meeting going on, and another running counter to keep track of the max meeting room. After the iteration is done, we return the maximum meeting room.

```python
class Solution:
    def minMeetingRooms(self, intervals: List[List[int]]) -> int:
        intervals.sort(key=lambda x: x[0])
        heap = []  # stores the end time of intervals
        for start, end in intervals:
            if heap and start >= heap[0]: 
                heapq.heapreplace(heap, end)    # means two intervals can use the same room
            else:
                heapq.heappush(heap, end)       # a new room is allocated
        
        return len(heap)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`