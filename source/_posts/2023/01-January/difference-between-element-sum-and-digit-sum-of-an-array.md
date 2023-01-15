---
extends: _layouts.post
section: content
title: Difference between element sum and digit sum of an array
problemUrl: https://leetcode.com/problems/difference-between-element-sum-and-digit-sum-of-an-array/
date: 2023-01-15
categories: [array-and-hashmap]
---

We will calculate the sum of every digit in the array and subtract it from the sum of the array.

```python
class Solution:
    def differenceOfSum(self, nums: List[int]) -> int:
        numsArrayAsString = list(''.join(map(str, nums)))
        numsArrayDigits = list(map(int, numsArrayAsString))
        digitSum = sum(numsArrayDigits)
        elementSum = sum(nums)
        return elementSum - digitSum
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can achieve the same result with a single line.

```python
class Solution:
    def differenceOfSum(self, nums: List[int]) -> int:
        return sum(nums) - sum(map(int, list(''.join(map(str, nums)))))
```