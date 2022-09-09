---
extends: _layouts.post
section: content
title: Find median from data stream
problemUrl: https://leetcode.com/problems/find-median-from-data-stream/
date: 2022-08-07
categories: [heap, design]
---

We will use a min heap and a max heap to calculate the median. The small heap will be a max heap and large heap will be a min heap. All the elements of the small heap will be smaller than large heap. So, whenever we insert something, we will insert it into the small heap and it at some point, small heap has 2 more elements than large heap, we will move one elements to the large heap, so it is never bigger than one element.

So, when we calculate the median, we need to get the middle number. As we already make the small heap always larger, then if we have odd number of elements, then the top of the small heap that is actually a max heap, we will get the largest element of the heap for our median. If we have even number of elements, then we will take the largets of the small heap and smallest of the large heap and return the agerage of it.

```python
from heapq import heappop, heappush

class MedianFinder:
    def __init__(self):
        self.small = []     # max heap
        self.large = []     # min heap

    def addNum(self, num: int) -> None:
        heappush(self.large, num)
        heappush(self.small, -1*heappop(self.large))

        if len(self.small) > len(self.large)+1:
            heappush(self.large, -1*heappop(self.small))

    def findMedian(self) -> float:
        if self.totalCount() % 2 != 0:
            return float(-1*self.small[0])
        return ((-1*self.small[0]) + self.large[0])/2

    def totalCount(self) -> int:
        return len(self.small) + len(self.large)

# Your MedianFinder object will be instantiated and called as such:
# obj = MedianFinder()
# obj.addNum(num)
# param_2 = obj.findMedian()
```

Time Complexity: `O(1)` for each operation <br/>
Space Complexity: `O(n)`