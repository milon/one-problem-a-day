---
extends: _layouts.post
section: content
title: Find all duplicates in an array
problemUrl: https://leetcode.com/problems/find-all-duplicates-in-an-array/
date: 2022-11-20
categories: [array-and-hashmap]
---

We will count the frequency of each number in the array, and return the numbers that appear twice.

```python
class Solution:
    def findDuplicates(self, nums: List[int]) -> List[int]:
        freq = collections.Counter(nums)
        return [num for num, count in freq.items() if count == 2]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`