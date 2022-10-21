---
extends: _layouts.post
section: content
title: Contains duplicate II
problemUrl: https://leetcode.com/problems/contains-duplicate-ii/
date: 2022-10-21
categories: [array-and-hashmap]
---

We will use a hashmap to store the last index of each number. For each number, we will check if the difference between the current index and the last index is less than or equal to k. If it is, then we will return true. Otherwise, we will update the last index of the number.

```python
class Solution:
    def containsNearbyDuplicate(self, nums: List[int], k: int) -> bool:
        lookup = {}
        for i, num in enumerate(nums):
            if num in lookup and i - lookup[num] <= k:
                return True
            lookup[num] = i
        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`