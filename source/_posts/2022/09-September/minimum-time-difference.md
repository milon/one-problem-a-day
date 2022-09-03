---
extends: _layouts.post
section: content
title: Minimum time difference
problemUrl: https://leetcode.com/problems/minimum-time-difference/
date: 2022-09-02
categories: [intervals]
---

First we convert the hours into minutes and append them into a new array. Then we sort the new array and go through each element and look for minimum difference. Once we reach the last element in the list, we compare the last element with the first element in the list.

```python
class Solution:
    def findMinDifference(self, timePoints: List[str]) -> int:
        def timeToMinutes(time):
            time = time.split(':')
            return int(time[0])*60 + int(time[1])
        
        timeInMinutes = []
        for point in timePoints:
            timeInMinutes.append(timeToMinutes(point))
        timeInMinutes.sort()
        
        minTime = math.inf
        for i in range(len(timeInMinutes)):
            if i == len(timeInMinutes)-1:
                minTime = min(minTime, 1440-timeInMinutes[i]+timeInMinutes[0])
            else:
                minTime = min(minTime, timeInMinutes[i+1]-timeInMinutes[i])
                
        return minTime
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`
