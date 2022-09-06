---
extends: _layouts.post
section: content
title: H-index II
problemUrl: https://leetcode.com/problems/h-index-ii/
date: 2022-09-06
categories: [array-and-hashmap]
---

We will seach for the highest mid where the value of mid is greater that or equal to the numbers of elements on the right from that mid index.

```python
class Solution:
    def hIndex(self, citations: List[int]) -> int:
        if citations[-1] == 0:
            return 0
        n = len(citations) 
        l, r = 0, n-1
        while l < r:
            m = (l+r)//2
            if citations[m] >= n-m:
                r = m
            else:
                l = m+1
        return n-l
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`