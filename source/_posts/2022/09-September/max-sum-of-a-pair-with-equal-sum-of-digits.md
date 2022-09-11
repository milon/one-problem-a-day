---
extends: _layouts.post
section: content
title: Max sum of a pair with equal sum of digits
problemUrl: https://leetcode.com/problems/max-sum-of-a-pair-with-equal-sum-of-digits/
date: 2022-09-11
categories: [array-and-hashmap]
---

This problem is very similar to two sum problem. But instead of storing the complement of the number, we will store the sum of digits of the number. When we iterate over the numbers, we will also keep a running result for the max of the number pair. If we can't find any after the iteration is done, we return -1, otherwise we will return the running maximum.

```python
class Solution:
    def maximumSum(self, nums: List[int]) -> int:
        res = -math.inf
        lookup = {}
        
        for num in nums:
            digitSum = sum([int(n) for n in str(num)])
            if digitSum not in lookup:
                lookup[digitSum] = num
            else:
                res = max(res, num+lookup[digitSum])
                lookup[digitSum] = max(lookup[digitSum], num)
        
        return res if res != -math.inf else -1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`