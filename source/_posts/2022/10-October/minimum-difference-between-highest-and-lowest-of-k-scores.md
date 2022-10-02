---
extends: _layouts.post
section: content
title: Minimum difference between highest and lowest of k scores
problemUrl: https://leetcode.com/problems/minimum-difference-between-highest-and-lowest-of-k-scores/
date: 2022-10-02
categories: [sliding-window]
---

We will first sort the elements and then loop over all the elements and take the difference between k elements, and keep a running minimum and then return that as result.

```python
class Solution:
    def minimumDifference(self, nums: List[int], k: int) -> int:
        nums.sort()
        k -= 1
        minDiff = math.inf
        for i in range(len(nums)-k):
            minDiff = min(minDiff, nums[i+k] - nums[i])
        return minDiff
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`