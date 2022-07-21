---
extends: _layouts.post
section: content
title: Meeting rooms
problemUrl: https://leetcode.com/problems/meeting-rooms/
date: 2022-07-21
categories: [intervals]
---

We will sort the given array based on start time. Then we can compare, if the end of first meeting is before the start of last meeting, if yes return False, else return True.

```python
class Solution:
    def canAttendMeetings(self, intervals):
        intervals.sort(key=lambda i: i.start)

        for i in range(1, len(intervals)):
            i1 = intervals[i - 1]
            i2 = intervals[i]

            if i1.end > i2.start:
                return False
        return True
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`