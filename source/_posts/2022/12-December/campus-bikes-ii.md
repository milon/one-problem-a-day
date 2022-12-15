---
extends: _layouts.post
section: content
title: Campus bikes II
problemUrl: https://leetcode.com/problems/campus-bikes-ii/
date: 2022-12-15
categories: [dynamic-programming]
---

We will use a dynamic programming approach to solve this problem. We will create a memoization table. We will iterate through the memoization table. We will iterate through the bikes. We will check if the bike is not assigned. We will assign the bike to the worker. We will calculate the minimum number of bikes that are assigned to the workers. We will unassign the bike from the worker. We will return the minimum number of bikes that are assigned to the workers.

```python
class Solution:
    def assignBikes(self, workers: List[List[int]], bikes: List[List[int]]) -> int:
        def distance(a: List[int], b: List[int]) -> int:
            return abs(a[0]-b[0]) + abs(a[1]-b[1])
        
        def dfs(p, arr, memo):
            if p == len(workers):
                return 0
            
            if (p, tuple(arr)) in memo:
                return memo[(p, tuple(arr))]
            
            temp = math.inf
            for i in range(len(arr)):
                if arr[i] == 0:
                    temp = min(temp, distance(bikes[i], workers[p]) + dfs(p+1, arr[:i]+[1]+arr[i+1:], memo))
            
            memo[(p, tuple(arr))] = temp
            return memo[(p, tuple(arr))]

        memo = {}
        res = dfs(0, [0 for _ in range(len(bikes))], memo)
        return res
```

Time complexity: `O(2^n)` <br/>
Space complexity: `O(2^n)`