---
extends: _layouts.post
section: content
title: H-index
problemUrl: https://leetcode.com/problems/h-index/
date: 2022-09-06
categories: [array-and-hashmap]
---

We will use count sort to sort the elements in linear time and then search for the highest value, where numbers of elements after that index is greater than or equal to that value.

```python
class Solution:
    def hIndex(self, citations: List[int]) -> int:
        count = [0] * (max(citations)+1)
        for c in citations:
            count[c] += 1
        curSum, h = 0, 0
        for i in range(len(count)-1, -1, -1):
            curSum += count[i]
            h = max(h, min(curSum, i))
        return h
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`