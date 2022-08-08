---
extends: _layouts.post
section: content
title: House robber II
problemUrl: https://leetcode.com/problems/house-robber-ii/
date: 2022-08-08
categories: [dynamic-programming]
---

We can calculate the house robber using the same logic as the problem [House robber](/problems/house-robber), but we can't take the last element as it will create a circle. So, we can actually take 2 sets of numbers, one will be from start to 1 item before last, and another set will be the from second item till last item. Then we will return the maximum of these 2 set as result.

```python
class Solution:
    def rob(self, nums: List[int]) -> int:
        def countSum(i, nums, memo):
            if i in memo:
                return memo[i]
            if i >= len(nums):
                return 0
            
            include = nums[i] + countSum(i+2, nums, memo)
            exclude = countSum(i+1, nums, memo)
            
            memo[i] = max(include, exclude)
            return memo[i]
        
        if len(nums) == 0:
            return 0
        elif len(nums) == 1:
            return nums[0]
        else:
            return max(countSum(0, nums[1:],{}), countSum(0, nums[:-1], {}))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`