---
extends: _layouts.post
section: content
title: Left and right sum differences
problemUrl: https://leetcode.com/problems/left-and-right-sum-differences/
date: 2023-05-24
categories: [array-and-hashmap]
---

We will iterate over the array and compute the sum of the left and right subarrays as we iterate through. Then we will compute the difference between the sums and append it to our result. Finally we return our result.

```python
class Solution:
    def leftRightDifference(self, nums: List[int]) -> List[int]:
        leftSum, rightSum = 0, sum(nums)
        res = []
        for num in nums:
            rightSum -= num
            res.append(abs(leftSum-rightSum))
            leftSum += num
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`