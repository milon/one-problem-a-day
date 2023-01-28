---
extends: _layouts.post
section: content
title: Data stream as disjoint intervals
problemUrl: https://leetcode.com/problems/data-stream-as-disjoint-intervals/
date: 2023-01-28
categories: [intervals]
---

We will construct the interval by expanding around each of the added numbers.

```python
class SummaryRanges:
    def __init__(self):
        self.nums = set()

    def addNum(self, value: int) -> None:
        self.nums.add(value)

    def getIntervals(self) -> List[List[int]]:
        intervals = []
        seen = set()
        for num in self.nums:
            if num in seen: 
                continue

            left = num
            while left - 1 in self.nums:
                left -= 1
                seen.add(left)

            right = num
            while right + 1 in self.nums:
                right += 1
                seen.add(right)
            
            intervals.append([left, right])
            
        return sorted(intervals)

# Your SummaryRanges object will be instantiated and called as such:
# obj = SummaryRanges()
# obj.addNum(value)
# param_2 = obj.getIntervals()
```

Time complexity: `O(n)` for getIntervals, `O(1)` for addNum <br/>
Space complexity: `O(n)`
