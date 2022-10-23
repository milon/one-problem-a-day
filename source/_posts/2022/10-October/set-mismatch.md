---
extends: _layouts.post
section: content
title: Set mismatch
problemUrl: https://leetcode.com/problems/set-mismatch/
date: 2022-10-23
categories: [math-and-geometry]
---

The sum of all numbers in the array is `n*(n+1)/2`. We calculate all the numbers in the array and subtract it from the sum. The result is the missing number. We will subtract the sum of all numbers in the array from the sum of all numbers from 1 to n. The result is the position of the duplicate number.

```python
class Solution:
    def findErrorNums(self, nums: List[int]) -> List[int]:
        n, a, b = len(nums), sum(nums), sum(set(nums))
        s = n*(n+1)//2
        return [a-b, s-b]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`