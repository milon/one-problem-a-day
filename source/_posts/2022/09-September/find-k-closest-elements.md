---
extends: _layouts.post
section: content
title: Find k closest elements
problemUrl: https://leetcode.com/problems/find-k-closest-elements/
date: 2022-09-08
categories: [heap]
---

We will iterate over our input array, find the absolute diffrece of each elements form target x, and put them into a heap alogn with the actual number. Then we pop k numbers from the heap, sort the values and return them as result.

```python
class Solution:
    def findClosestElements(self, arr: List[int], k: int, x: int) -> List[int]:
        heap = []
        for i in range(len(arr)):
            diff = abs(x-arr[i])
            heapq.heappush(heap, (diff, arr[i]))
            
        res = []
        while k:
            diff, val = heapq.heappop(heap)
            res.append(val)
            k -= 1
        
        return sorted(res)
```

Time Complexity: `O(nlog(k))` <br/>
Space Complexity: `O(n)`

