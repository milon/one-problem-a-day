---
extends: _layouts.post
section: content
title: Summary ranges
problemUrl: https://leetcode.com/problems/summary-ranges/
date: 2023-06-11
categories: [array-and-hashmap]
---

We will iterate over the array and find the ranges. Then we will map the ranges to the required format.

```python
class Solution:
    def summaryRanges(self, nums: List[int]) -> List[str]:
        ranges = []
        for n in nums:
            if not ranges or n > ranges[-1][-1] + 1:
                ranges += [],
            ranges[-1][1:] = n,
        return ['->'.join(map(str, r)) for r in ranges]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`