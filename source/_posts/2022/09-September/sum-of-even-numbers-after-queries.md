---
extends: _layouts.post
section: content
title: Sum of even numbers after queries
problemUrl: https://leetcode.com/problems/sum-of-even-numbers-after-queries/
date: 2022-09-21
categories: [array-and-hashmap]
---

We will first calculate the sum of all even values. Then we follow the problem instruction, calculate the even sum after modifying the value according the query, then update the even sum and append it to our result. Finally after iterating through all the queries, we return our result.

```python
class Solution:
    def sumEvenAfterQueries(self, nums: List[int], queries: List[List[int]]) -> List[int]:
        evenSum = sum([num for num in nums if num % 2 == 0])
        res = []
        for val, idx in queries:
            if nums[idx] % 2 == 0:
                evenSum -= nums[idx]
            
            nums[idx] += val
            
            if nums[idx] % 2 == 0:
                evenSum += nums[idx]
            
            res.append(evenSum)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`