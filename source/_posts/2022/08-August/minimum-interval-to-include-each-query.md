---
extends: _layouts.post
section: content
title: Minimum interval to include each query
problemUrl: https://leetcode.com/problems/minimum-interval-to-include-each-query/
date: 2022-08-07
categories: [intervals]
---

We will keep track of the smallest interval for each query in a min heap, so whenever we pop something from the heap, it's always the smallest number. And then we put that smallest number in our result hashmap. Finally, we will keep all the values for the queries from the result hashmap and return it as a list.

```python
class Solution:
    def minInterval(self, intervals: List[List[int]], queries: List[int]) -> List[int]:
        intervals.sort()
        minHeap = []
        res = {}
        i = 0
        for q in sorted(queries):
            while i < len(intervals) and intervals[i][0] <= q:
                l, r = intervals[i]
                heapq.heappush(minHeap, (r - l + 1, r))
                i += 1

            while minHeap and minHeap[0][1] < q:
                heapq.heappop(minHeap)

            res[q] = minHeap[0][0] if minHeap else -1

        return [res[q] for q in queries]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`


