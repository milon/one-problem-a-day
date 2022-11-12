---
extends: _layouts.post
section: content
title: Least number of unique integers after k removals
problemUrl: https://leetcode.com/problems/least-number-of-unique-integers-after-k-removals/
date: 2022-11-12
categories: [heap]
---

We can use a heap to keep track of the frequency of each number. Then we can pop the smallest frequency from the heap until we have removed `k` numbers. The remaining numbers are the unique numbers.

```python
class Solution:
    def findLeastNumOfUniqueInts(self, arr: List[int], k: int) -> int:
        heap = list(collections.Counter(arr).values())
        heapq.heapify(heap)
        while k > 0:
            k -= heapq.heappop(heap)
        return len(heap)+1 if k<0 else len(heap)
```

Time Complexity: `O(n+klog(n))` <br/>
Space Complexity: `O(n)`