---
extends: _layouts.post
section: content
title: Minimum average difference
problemUrl: https://leetcode.com/problems/minimum-average-difference/
date: 2022-12-04
categories: [array-and-hashmap]
---

We will use prefix sum to solve this problem. We will calculate the prefix sum of the first half of the array and the second half of the array. Then we will iterate over the first half of the array and find the index of the element in the second half of the array which is closest to the current element. Then we will calculate the average of the current element and the closest element in the second half of the array. We will keep track of the minimum average and return it at the end.

```python
class Solution:
    def minimumAverageDifference(self, nums: List[int]) -> int:
        n, totalSum, leftSum = len(nums), sum(nums), 0
        res = (math.inf, math.inf) # [diff, index]
        
        for i, num in enumerate(nums):
            leftSum += num
            leftAvg = leftSum // (i+1)
            rightAvg = (totalSum-leftSum)//(n-i-1) if n-i-1 !=0 else 0
            absDiff = abs(leftAvg-rightAvg)
            res = min(res, (absDiff, i))
        
        return res[1]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`
