---
extends: _layouts.post
section: content
title: Merge intervals
problemUrl: https://leetcode.com/problems/merge-intervals/
date: 2022-07-21
categories: [intervals]
---

First we sort the intervals with the start key. Then we append the first item on the output list. Then we will iterate over all intervals and compare the last end with the current start, if the last end is bigger than the current start, then we merge both interval, keep the start as first interval's start and make the end as the maximum of 2 intervals. Otherwise, we will append the interval in out result array. When the iteration is done, we return the result.

```python
class Solution:
    def merge(self, intervals: List[List[int]]) -> List[List[int]]:
        intervals.sort(key=lambda pair: pair[0])
        output = [intervals[0]]

        for start, end in intervals:
            lastEnd = output[-1][1]

            if start <= lastEnd:
                output[-1][1] = max(lastEnd, end)
            else:
                output.append([start, end])

        return output
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`