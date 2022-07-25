---
extends: _layouts.post
section: content
title: Brust balloons
problemUrl: https://leetcode.com/problems/brust-balloons/
date: 2022-07-25
categories: [dynamic-programming]
---

Fist we will add 1 in either side of the input list to tackle terminal edges. We will create a decision tree, the base case will be if we brust the element last, then the coin would be the balloon itself multiple by 2 consicutive element. Then we recursively get the left subarray value without the element and the right subarray value without the element and sum them up. We will do it for every element and keep track of maximum coins and return it.

```python
class Solution:
    def maxCoins(self, nums: List[int]) -> int:
        dp = {}
        nums = [1] + nums + [1]
        
        def dfs(l, r):
            if l > r:
                return 0
            if (l, r) in dp:
                return dp[(l, r)]
            
            dp[(l, r)] = 0
            for i in range(l, r+1):
                coins = nums[l-1] * nums[i] * nums[r+1]
                coins += dfs(l, i-1) + dfs(i+1, r)
                dp[(l, r)] = max(dp[(l, r)], coins)
            return dp[(l, r)]
        
        return dfs(1, len(nums)-2)
```

Time Complexity: `O(n^3)` <br/>
Space Complexity: `O(n^2)`