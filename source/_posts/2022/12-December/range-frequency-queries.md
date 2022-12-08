---
extends: _layouts.post
section: content
title: Range frequency queries
problemUrl: https://leetcode.com/problems/range-frequency-queries/
date: 2022-12-08
categories: [binary-search, design]
---

We can use a hash map to store the frequency of each number. Then we can use a binary search to find the number of numbers that have a frequency greater than or equal to value.

```python
class RangeFreqQuery:
    def __init__(self, arr: List[int]):
        self.seen = collections.defaultdict(list)
        for i, num in enumerate(arr):
            self.seen[num].append(i)

    def query(self, left: int, right: int, value: int) -> int:
        if value not in self.seen:
            return 0
        
        arr = self.seen[value]
        l = bisect.bisect_left(arr, left)
        r = bisect.bisect_right(arr, right)

        return r - l

# Your RangeFreqQuery object will be instantiated and called as such:
# obj = RangeFreqQuery(arr)
# param_1 = obj.query(left,right,value)
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(n)`