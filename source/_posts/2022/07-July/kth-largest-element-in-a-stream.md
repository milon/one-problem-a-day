---
extends: _layouts.post
section: content
title: Kth largest element in a stream
problemUrl: https://leetcode.com/problems/kth-largest-element-in-a-stream/
date: 2022-07-20
categories: [heap]
---

We will create a min heap from the elements of the stream. We will make sure heap size is always k. That means the smallest element will ve at the heap's top and the largest element will be at the 0th index. Then we can return the 0th index of the heap in add operation.

```python
class KthLargest:
    def __init__(self, k: int, nums: List[int]):
        self.minHeap, self.k = nums, k
        heapq.heapify(self.minHeap)
        while len(self.minHeap) > k:
            heapq.heappop(self.minHeap)

    def add(self, val: int) -> int:
        heapq.heappush(self.minHeap, val)
        if len(self.minHeap) > self.k:
            heapq.heappop(self.minHeap)
        return self.minHeap[0]

# Your KthLargest object will be instantiated and called as such:
# obj = KthLargest(k, nums)
# param_1 = obj.add(val)
```

Time Complexity: `O(1)` for each operation <br/>
Space Complexity: `O(k)` for k is the number of elements in the heap