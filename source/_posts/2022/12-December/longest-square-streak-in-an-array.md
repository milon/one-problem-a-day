---
extends: _layouts.post
section: content
title: Longest square streak in an array
problemUrl: https://leetcode.com/problems/longest-square-streak-in-an-array/
date: 2022-12-12
categories: [greedy]
---

We will use a greedy approach to solve this problem. We will keep on iterating over the sorted array and we will check whether the square of the number is available in the array. If it is available, we will increment the streak by 1 and we will update the number to be the square of the number. We will keep on doing this until the square of the number is not available in the array. We will keep on doing this for all the numbers in the array. At the end, we will return the maximum streak.

```python
class Solution:
    def longestSquareStreak(self, nums: List[int]) -> int:
        nums, used = set(nums), set()
        res = 1
        for num in sorted(nums):
            if num in used:
                continue
            
            used.add(num)
            cur = 1
            while (num**2 in nums):
                used.add(num**2)
                num *= num
                cur += 1
            res = max(res, cur)
        
        return res if res > 1 else -1
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`