---
extends: _layouts.post
section: content
title: Arithmetic slices II subsequence
problemUrl: https://leetcode.com/problems/arithmetic-slices-ii-subsequence/
date: 2022-11-27
categories: [dynamic-programming]
---

We will use dynamic programming to solve the problem. We will use a hashmap to store the number of arithmetic slices that ends with the current number. We will iterate over the numbers, and for each number, we will iterate over the numbers before the current number to find the difference between the current number and the previous number. If the difference is in the hashmap, we will update the number of arithmetic slices that ends with the current number. We will also update the total number of arithmetic slices.

```python
class Solution:
    def numberOfArithmeticSlices(self, nums: List[int]) -> int:
        res = 0
        dp = [collections.defaultdict(int) for _ in range(len(nums))]
        for i in range(len(nums)):
            for j in range(i):
                diff = nums[i] - nums[j]
                dp[i][diff] += 1
                if diff in dp[j]:
                    dp[i][diff] += dp[j][diff]
                    res += dp[j][diff]
        return res
```

Time complexity: `O(n^2)`, n is the length of nums <br/>
Space complexity: `O(n^2)`