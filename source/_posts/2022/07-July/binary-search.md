---
extends: _layouts.post
section: content
title: Binary search
problemUrl: https://leetcode.com/problems/binary-search/
date: 2022-07-19
categories: [binary-search]
---

The problem itself is called binary search, all we need to do a classic binary search. We will choose a mid, if the target value is greater than the mid value, we move our left pointer to mid or if the target is lesser that the mid value, then we move our right pointer to mid. If both values are equal, then we find the value and return. If the left value and right value crosses each other, then the value doesn't exists in the array and we return -1.

```python
class Solution:
    def search(self, nums: List[int], target: int) -> int:
        l, r = 0, len(nums)-1
        while l <= r:
            m = (l+r)//2
            if nums[m] < target:
                l = m+1
            elif nums[m] > target:
                r = m-1
            else:
                return m
        return -1
```

Time Complexity: `O(log(n))` <br/>
Space Complexity: `O(1)`

