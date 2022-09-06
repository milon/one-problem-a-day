---
extends: _layouts.post
section: content
title: Smallest number in infinite set
problemUrl: https://leetcode.com/problems/smallest-number-in-infinite-set/
date: 2022-09-06
categories: [heap]
---

We will first create a heap with 1000 elements from 1 to 1000 as at most 1000 call will be made. If we want to add something, we will check whether it is already present in the heap, if not, we will push it to the heap. When we want to pop the smallest, we will just pop it from the heap and return.

```python
class SmallestInfiniteSet:
    def __init__(self):
        self.heap = [i for i in range(1,1001)]

    def popSmallest(self) -> int:
        return heapq.heappop(self.heap)

    def addBack(self, num: int) -> None:
        if num not in self.heap:
            heapq.heappush(self.heap, num)

# Your SmallestInfiniteSet object will be instantiated and called as such:
# obj = SmallestInfiniteSet()
# param_1 = obj.popSmallest()
# obj.addBack(num)
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`