---
extends: _layouts.post
section: content
title: Minimize maximum pair sum in array
problemUrl: https://leetcode.com/problems/minimize-maximum-pair-sum-in-array/
date: 2022-11-26
categories: [greedy]
---

We will sort the array. We will iterate over the array from the beginning and the end. We will add the first element and the last element to the result. We will return the result.

```python
class Solution:
    def minPairSum(self, nums: List[int]) -> int:
        nums.sort()
        res = 0
        for i in range(len(nums)//2):
            res = max(res, nums[i]+nums[-i-1])
        return res
```

Time complexity: `O(nlog(n))`, n is the length of nums <br/>
Space complexity: `O(1)`

We can also solve it using python built-in functions:

```python
class Solution:
    def minPairSum(self, nums: List[int]) -> int:
        nums.sort()
        return max(a+b for a, b in zip(nums, reversed(nums)))
```

Time complexity: `O(nlog(n))`, n is the length of nums <br/>
Space complexity: `O(n)`