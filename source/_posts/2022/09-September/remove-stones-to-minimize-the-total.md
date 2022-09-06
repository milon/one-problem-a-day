---
extends: _layouts.post
section: content
title: Remove stones to minimize the total
problemUrl: https://leetcode.com/problems/remove-stones-to-minimize-the-total/
date: 2022-09-06
categories: [heap]
---

We will use a max heap to get the top k elements from the piles. As python does not have max heap out of the box, we can multiply each element by -1 and thus min heap will work as max heap. Now we take the top element, divide it half, and then push it back to the max heap. Finally doing it for k times, we will count the sum of all the elements on the heap, and return it with multiply by -1.

```python
class Solution:
    def minStoneSum(self, piles: List[int], k: int) -> int:
        nums = [-1*n for n in piles]
        heapq.heapify(nums)
        for _ in range(k):
            element = -1 * heapq.heappop(nums)
            heapq.heappush(nums, -1 * (element-(element//2)))
        
        return -1 * sum(nums)
```