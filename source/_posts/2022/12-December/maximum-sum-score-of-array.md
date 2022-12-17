---
extends: _layouts.post
section: content
title: Maximum sum score of array
problemUrl: https://leetcode.com/problems/maximum-sum-score-of-array/
date: 2022-12-17
categories: [array-and-hashmap]
---

We will calculate the prefix sum of the array. Then we will iterate through the array, and for each element, we will find the maximum sum of the subarray that ends at the current element. Then we will update the maximum sum of the subarray that ends at the current element.

```python
class Solution:
    def maximumSumScore(self, nums: List[int]) -> int:
        score = -math.inf
        leftSum, rightSum = 0, sum(nums)
        for num in nums:
            leftSum += num
            score = max(score, leftSum, rightSum)
            rightSum -= num
        return score
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`