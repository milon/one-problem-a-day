---
extends: _layouts.post
section: content
title: Interval list intersections
problemUrl: https://leetcode.com/problems/interval-list-intersections/
date: 2022-08-27
categories: [intervals]
---

We will iterate over both list and check whether we have any overlaps or not, if we have we take the maximum of start time and minimum of end time as the intersection value and append it to our result list. After the iteration is done, we will return the result.

```python
class Solution:
    def intervalIntersection(self, firstList: List[List[int]], secondList: List[List[int]]) -> List[List[int]]:
        def overlaps(i, j):
            return (
                secondList[j][0] <= firstList[i][0] <= secondList[j][1] or 
                firstList[i][0] <= secondList[j][0] <= firstList[i][1]
            )
        
        res = []
        i, j = 0, 0
        while i<len(firstList) and j<len(secondList):
            if overlaps(i, j):
                res.append([
                    max(firstList[i][0], secondList[j][0]),
                    min(firstList[i][1], secondList[j][1])
                ])
            if firstList[i][1] < secondList[j][1]:
                i += 1
            else:
                j += 1
        
        return res
```

Time Complexity: `O(n+m)`, n is the length of first list and m is the length of second list.
Space Complexity: `O(1)`