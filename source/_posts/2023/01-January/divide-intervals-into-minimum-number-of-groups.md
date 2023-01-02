---
extends: _layouts.post
section: content
title: Divide intervals into minimum number of groups
problemUrl: https://leetcode.com/problems/divide-intervals-into-minimum-number-of-groups/
date: 2023-01-02
categories: [heap, intervals]
---

We will sort the intervals by the end point. Then we will iterate over the intervals and for each interval we will check if the start point is greater than the end point of the last interval in the heap. If it is, we will pop the last interval from the heap and push the current interval. Otherwise, we will push the current interval to the heap. Finally, we will return the size of the heap.

```python
class Solution:
    def divideIntervals(self, intervals: List[List[int]]) -> int:
        intervals.sort(key = lambda x: x[0])
        res = 0
        heap, heap_size = [], 0
        for interval in intervals:
            while heap and heap[0] <= interval[0]:
                heapq.heappop(heap)
                heap_size -= 1
            heapq.heappush(heap, interval[1] + 1)
            heap_size += 1
            res = max(res, heap_size)
        return res
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`