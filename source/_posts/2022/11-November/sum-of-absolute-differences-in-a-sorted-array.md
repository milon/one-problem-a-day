---
extends: _layouts.post
section: content
title: Sum of absolute differences in a sorted array
problemUrl: https://leetcode.com/problems/sum-of-absolute-differences-in-a-sorted-array/
date: 2022-11-21
categories: [array-and-hashmap]
---

The absolute difference between two numbers a and b is:

- `a - b`: When a is greater than or equal to b.
- `b - a`: When a is less than or equal to b.

These cases overlap when a is equal to b, but in that case `a - b` and `b - a` are both equal to 0, so it's ok.

Fix some index 0 ≤ i < n. Since our array is non-decreasing, the sum of the absolute difference between nums[i] and the elements to its left will just be i times nums[i] minus the sum of the numbers to its left, and the sum of the absolute difference between nums[i] and the elements to its right will be the sum of the elements to its right minus the number of elements to its right (n - i - 1) times nums[i].

```python
class Solution:
    def getSumAbsoluteDifferences(self, nums: List[int]) -> List[int]:
        n = len(nums)
        leftSum, rightSum = 0, sum(nums)
        res = []
        for i, num in enumerate(nums):
            res.append(rightSum-(n-i)*num+i*num-leftSum)
            rightSum -= num
            leftSum += num
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`