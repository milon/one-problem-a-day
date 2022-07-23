---
extends: _layouts.post
section: content
title: Kth largest element in an array
problemUrl: https://leetcode.com/problems/kth-largest-element-in-an-array/
date: 2022-07-23
categories: [heap]
---

We can just sort the element and return second largest element from the array, but it will have `O(nlog(n))` time complexity. But if we use a heap, then the time complexity will be `O(n)` for heapify and then `O(log(n))` for every element we pop from the heap.

```python
class Solution:
    def findKthLargest(self, nums: List[int], k: int) -> int:
        nums = [-num for num in nums]
        heapq.heapify(nums)
        while k>0:
            item = heapq.heappop(nums)
            k -= 1
        return -item
```

Time Complexity: `O(n+klog(n))`, where n is the length of nums, and k is the value of k. <br/>
Space Complexity: `O(n)`