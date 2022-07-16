---
extends: _layouts.post
section: content
title: Missing number
problemUrl: https://leetcode.com/problems/missing-number/
date: 2022-07-16
categories: [bit-manipulation]
---

We can XOR the same number to even it out, for example 3^3 or 5^5 will always be 0. That means we can XOR every number form 1 to number of element in our input array and then XOR the input numbers with it. That will even our every number except the missing number.

```python
class Solution:
    def missingNumber(self, nums: List[int]) -> int:
        missing = 0
        for i in range(1, len(nums)+1):
            missing ^= i
        for num in nums:
            missing ^= num
        return missing
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`