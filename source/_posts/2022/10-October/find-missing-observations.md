---
extends: _layouts.post
section: content
title: Find missing observations
problemUrl: https://leetcode.com/problems/find-missing-observations/
date: 2022-10-13
categories: [math-and-geometry]
---

We are given an array of `n` integers. We are also given `m` missing values. We need to find all the possible values that can be assigned to the missing values such that the sum of the array becomes `totalSum`.

We will calculate the sum of the array. Then, we will calculate the sum of the missing values. We will subtract the sum of the missing values from the `totalSum` to get the sum of the array. Then, we will divide the sum of the array by `n+m` to get the value of each missing value. We will check if the value of each missing value is in the range `[1, 6]`. If it is, we will add it to the result.

```python
class Solution:
    def missingRolls(self, rolls: List[int], mean: int, n: int) -> List[int]:
        numRolls = len(rolls)
        curSum = sum(rolls)
        missingSum = mean * (n + numRolls) - curSum
        
        if missingSum < n or missingSum > 6*n: 
            return []
        
        part, rem = divmod(missingSum, n)
        ans = [part] * n
        for i in range(rem):
            ans[i] += 1
        return ans
```

Time Complexity: `O(m+n)` <br/>
Space Complexity: `O(1)`