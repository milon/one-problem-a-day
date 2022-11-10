---
extends: _layouts.post
section: content
title: Find peak element
problemUrl: https://leetcode.com/problems/find-peak-element/
date: 2022-11-10
categories: [binary-search]
---

We will use binary search to find the peak element. We will then return the index of the peak element.

```python
class Solution:
    def findPeakElement(self, nums: List[int]) -> int:
        start, end = 0, len(nums)-1
        while start < end:
            mid = start + (end-start) // 2
            if nums[mid] > nums[mid+1]:
                end = mid
            else:
                start = mid+1
        return start
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`