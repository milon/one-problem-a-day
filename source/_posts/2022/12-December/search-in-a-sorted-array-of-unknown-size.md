---
extends: _layouts.post
section: content
title: Search in a sorted array of unknown size
problemUrl: https://leetcode.com/problems/search-in-a-sorted-array-of-unknown-size/
date: 2022-12-02
categories: [binary-search]
---

We will use binary search to find the index of the target. We will start with the index 1. If the element at the index is smaller than the target, then we will double the index. If the element at the index is larger than the target, then we will use binary search to find the index of the target. If the element at the index is equal to the target, then we will return the index.

```python
# """
# This is ArrayReader's API interface.
# You should not implement it, or speculate about its implementation
# """
#class ArrayReader:
#    def get(self, index: int) -> int:

class Solution:
    def search(self, reader: 'ArrayReader', target: int) -> int:
        l, r = 0, 1
        
        while reader.get(r) < target:
            l = r
            r *= 2
        
        while l <= r:
            m = l + (r-l)//2
            if reader.get(m) == target:
                return m
            elif reader.get(m) > target:
                r = m - 1
            else:
                l = m + 1
        
        return -1
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`