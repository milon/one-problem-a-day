---
extends: _layouts.post
section: content
title: Steps to make array non decreasing
problemUrl: https://leetcode.com/problems/steps-to-make-array-non-decreasing/
date: 2023-01-05
categories: [stack, dynamic-programming]
---

Iterating the input A backward, then for each `nums[i]`, find how many round it can eat on its right. `dp[i]` means the number of element `nums[i]` can eat on its right. More precisely, the number of rounds for an element `nums[i]`, to completely eat whatever it can eat on the right of `nums[i]`, if it is possible.

Iterative input array A reversely, If `nums[i]` is bigger the last element `nums[j]` of stack, this means `nums[i]` can eat that element, then update `dp[i]` to be max of `dp[i]+1` and `dp[j]`.

```python
class Solution:
    def totalSteps(self, nums: List[int]) -> int:
        n = len(nums)
        dp = [0] * n
        stack = []
        for i in range(n-1, -1, -1):
            while stack and nums[i] > nums[stack[-1]]:
                dp[i] = max(dp[i]+1, dp[stack.pop()])
            stack.append(i)
        return max(dp)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`