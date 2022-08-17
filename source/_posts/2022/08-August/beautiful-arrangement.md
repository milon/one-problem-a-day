---
extends: _layouts.post
section: content
title: Beautiful arrangement
problemUrl: https://leetcode.com/problems/beautiful-arrangement/
date: 2022-08-17
categories: [backtracking]
---

Generate the array of numbers that will be used to create permutations of 1 to n (n inclusive) ex: 3 will become [1, 2, 3]. Then, iterate through all elements in the list and compare it to i which is initialized at 1 to avoid the while index + 1 thing. If the number is divisible by i or i is divisible by the number, remove the number from nums and continue generating the permutation. If a full permutation is generated (i == n+1, aka went past the index) then we have one solution. Add that to the result.

```python
class Solution:
    def countArrangement(self, n: int) -> int:
        nums = [i for i in range(1, n+1)]
        
        def dfs(nums, i):
            if i == n+1:
                return 1
            res = 0
            for j, num in enumerate(nums):
                if num % i == 0 or i % num == 0:
                    res += dfs(nums[:j] + nums[j+1:], i+1)
            return res
        
        return dfs(nums, 1)
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`