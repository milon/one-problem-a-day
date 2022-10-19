---
extends: _layouts.post
section: content
title: Minimum operations to halve array sum
problemUrl: https://leetcode.com/problems/minimum-operations-to-halve-array-sum/
date: 2022-10-19
categories: [heap]
---

We will compute the half of the sum of the input nums, put all nums into a max heap. Then pull out and cut the current max value by half and add it back to heap, deduct the half of the sum accordingly and increase the counter ops by 1. Repeat it utill half <= 0, then return ops.

```python
class Solution:
    def halveArray(self, nums: List[int]) -> int:
        half, ops = sum(nums)/2, 0
        heap = [-num for num in nums]
        heapq.heapify(heap)
        
        while half > 0:
            num = -heapq.heappop(heap)
            num /= 2.0
            half -= num
            heappush(heap, -num)
            ops += 1
            
        return ops
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`