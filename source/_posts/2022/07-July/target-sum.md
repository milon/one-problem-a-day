---
extends: _layouts.post
section: content
title: Target sum
problemUrl: https://leetcode.com/problems/target-sum/
date: 2022-07-17
categories: [dynamic-programming]
---

We will first solve it with brute force using recursion and then use memoization to make it efficient. For recursion, we can think about the base case, we will start our index at the number of element of the given array, and when our index is less then 0, we stop our recursion. We will also keep track of a running current sum. when our recursion is done, if the current sum is equal to target then we found the path, else we return 0. Then we call each element from the input array twice for the recursion, one for the positive value and one for the negative value.

```python
class Solution:
    def findTargetSumWays(self, nums: List[int], target: int) -> int:
        def findWays(index, current_sum, memo):
            if (index, current_sum) in memo:
                return memo[(index, current_sum)]
            
            if index < 0 and current_sum == target:
                return 1
            if index < 0:
                return 0
            
            positive = findWays(index-1, current_sum+nums[index], memo)
            negative = findWays(index-1, current_sum-nums[index], memo)
            memo[(index, current_sum)] = positive + negative
            
            return memo[(index, current_sum)]
        
        index = len(nums)-1
        return findWays(index, 0, {})
```

Time Complexity: O(n*t), n is the number of elements in the array, t is the target sum <br>
Space Complexity: O(n*t)