---
extends: _layouts.post
section: content
title: Sum of all odd length subarrays
problemUrl: https://leetcode.com/problems/sum-of-all-odd-length-subarrays/
date: 2023-01-01
categories: [array-and-hashmap]
---

We will generate all possible subarrays of odd length and sum them.

```python
class Solution:
    def sumOddLengthSubarrays(self, arr: List[int]) -> int:
        res = 0
        for i in range(len(arr)):
            for j in range(i, len(arr), 2):
                res += sum(arr[i:j + 1])
        return res
```

Time complexity: `O(n^3)` <br/>
Space complexity: `O(1)`

We can do this in one line too-
    
```python
class Solution:
    def sumOddLengthSubarrays(self, arr: List[int]) -> int:
        return sum(sum(arr[i:j + 1]) for i in range(len(arr)) for j in range(i, len(arr), 2))
```