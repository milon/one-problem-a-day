---
extends: _layouts.post
section: content
title: Maximum performance of a team
problemUrl: https://leetcode.com/problems/maximum-performance-of-a-team/
date: 2022-09-11
categories: [heap]
---

We will take a queue to store the maximum k number of speed. Then we iterate over the sorted array which we will create by combining efficiency and speed array, push the item to the heap, also count the sum of the items in heap. Then we multiply the sum with the efficiency and store it in our running result. For each iteration we will uodate the result with the maximum value and then return it by modding by 10^9+7 after the iteration is done.

```python
class Solution:
    def maxPerformance(self, n: int, speed: List[int], efficiency: List[int], k: int) -> int:
        MOD = 10**9 + 7
        heap = []
        res, _sum = 0, 0
        for e, s in sorted(zip(efficiency, speed), reverse=True):
            heapq.heappush(heap, s)
            _sum += s
            if len(heap) > k:
                _sum -= heapq.heappop(heap)
            res = max(res, _sum * e)
        return res % MOD
```

Time Complexity: `O(nlog(n))` for sorting, `O(nlog(k))` for heap <br/>
Space Complexity: `O(n)`