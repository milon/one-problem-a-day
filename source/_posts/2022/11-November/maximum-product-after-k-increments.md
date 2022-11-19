---
extends: _layouts.post
section: content
title: Maximum product after k increments
problemUrl: https://leetcode.com/problems/maximum-product-after-k-increments/
date: 2022-11-19
categories: [heap]
---

We will use a heap to keep track of the minimum element in the array. Then we will iterate k times and we will pop the minimum element from the heap and add 1 to it. We will push the new element back to the heap. We will continue this process until we reach the end of the array.

```python
class Solution:
    def maxProductAfterKIncrements(self, nums: List[int], k: int) -> int:
        heapq.heapify(nums)
        for _ in range(k):
            heapq.heappush(nums, heapq.heappop(nums)+1)
        
        res = 1
        for num in heap:
            res *= num
        return res % (10**9+7)
```

Time complexity: `O(klog(n))` <br/>
Space complexity: `O(n)`