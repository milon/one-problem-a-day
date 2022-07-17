---
extends: _layouts.post
section: content
title: House robber
problemUrl: https://leetcode.com/problems/house-robber/
date: 2022-07-17
categories: [dynamic-programming]
---

We will first solve this with brute force and then use memoization to optimize our solution. For this problem, if we have no item, then the sum would be zero, so it would be our base case, we have 2 options for our recursive call, either we include the element or not. Then we take the maximum of this 2 branch and return it.

```python
class Solution:
    def rob(self, nums: List[int]) -> int:
        def countSum(i, memo):
            if i in memo:
                return memo[i]
            
            if i >= len(nums):
                return 0
            
            include = nums[i] + countSum(i+2, memo)
            exclude = countSum(i+1, memo)
            memo[i] = max(include, exclude)
            return memo[i]
        
        return countSum(0, {})
```

Time Complexity: O(n) <br/>
Space Complexity: O(n)