---
extends: _layouts.post
section: content
title: Min cost climbing stairs
problemUrl: https://leetcode.com/problems/min-cost-climbing-stairs/
date: 2022-07-31
categories: [dynamic-programming]
---

We will follow the similar approach as Climbing stairs, first solve it with recursion, the use memoization to make it efficient. If the number of stairs is less than 0, then the cost of climbing it is also 0. As we can take atmost 2 steps at a time, then if the cost of climbing it also depends of the corresponding value. This will be our base case. Then we will calculate the min cost by reducing the steps by 1 and 2, calculate both of those cost, and then return the minimum value.

```python
class Solution:
    def minCostClimbingStairs(self, cost: List[int]) -> int:
        n = len(cost)-1
        memo = {}
        
        def _minCost(cost: List[int], n: int, memo: dict) -> int:
            if n in memo:
                return memo[n]
            
            if n < 0:
                return 0
            if n == 0 or n == 1:
                return cost[n]
            
            memo[n] = cost[n] + min(_minCost(cost, n-1, memo), _minCost(cost, n-2, memo))
            return memo[n]
        
        return min(_minCost(cost, n, memo), _minCost(cost, n-1, memo))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
