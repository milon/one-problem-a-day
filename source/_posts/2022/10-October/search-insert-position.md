---
extends: _layouts.post
section: content
title: Search insert position
problemUrl: https://leetcode.com/problems/search-insert-position/
date: 2022-10-07
categories: [binary-search]
---

This one is the classic binary search problem. We will strat looking for the target, if we find the target then we insert on that position. If we don't find the target, then we insert at the last low pointer position, beacuse that is the place it is most suitable.

```python
class Solution:
    def searchInsert(self, nums: List[int], target: int) -> int:
        low, high = 0, len(nums)-1
        while low <= high:
            mid = (low + high) // 2
            if target == nums[mid]:
                return mid
            
            if target > nums[mid]:
                low = mid + 1
            else:
                high = mid-1
        return low
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(n)`