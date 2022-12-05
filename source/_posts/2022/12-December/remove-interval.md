---
extends: _layouts.post
section: content
title: Remove interval
problemUrl: https://leetcode.com/problems/remove-interval/
date: 2022-12-05
categories: [intervals]
---

We will iterate over each interval, if the interval doesn't overlap with the to be removed interval, we just add it to the output. If start is less than remove start, we take the remove start as end. If the end is greater than the remove end, we take the remove end as start. We continue over each itervals and finally return the res.

```python
class Solution:
    def removeInterval(self, intervals: List[List[int]], toBeRemoved: List[int]) -> List[List[int]]:
        removeStart, removeEnd = toBeRemoved
        res = []
        for start, end in intervals:
            if start > removeEnd or end < removeStart:
                res.append([start, end])
            else:
                if start < removeStart:
                    res.append([start, removeStart])
                    
                if end > removeEnd:
                    res.append([removeEnd, end])
                    
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`