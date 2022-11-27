---
extends: _layouts.post
section: content
title: Arithmetic slices
problemUrl: https://leetcode.com/problems/arithmetic-slices/
date: 2022-11-27
categories: [dynamic-programming]
---

We will take a top-down approach to solve the problem. Then we memoize each subproblem to avoid duplicate computation.

```python
class Solution:
    def numberOfArithmeticSlices(self, nums: List[int]) -> int:
        def dp(i: int, memo: dict) -> int:
            if i in memo:
                return memo[i]
            
            if i < 2:
                return 0
            
            if nums[i] - nums[i-1] == nums[i-1] - nums[i-2]:
                memo[i] = 1 + dp(i-1, memo)
                return memo[i]
            else:
                return 0
				
        count, memo = 0, {}
        for i in range(len(nums)):
            count += dp(i, memo)
        
        return count
```

Time complexity: `O(n)`, n is the length of nums <br/>
Space complexity: `O(n)`
