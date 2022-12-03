---
extends: _layouts.post
section: content
title: Number of subarrays with lcm equal to k
problemUrl: https://leetcode.com/problems/number-of-subarrays-with-lcm-equal-to-k/
date: 2022-12-03
categories: [math-and-geometry]
---

We will take every possible subarray of the input array and calculate the lcm of the subarray. If the lcm is equal to k, we will increment the count of such subarrays.

```python
class Solution:
    def subarrayLCM(self, nums: List[int], k: int) -> int:
        def gcd(a: int, b: int) -> int:
            while a and b:
                a, b = b, a%b
            return a or b
        
        def lcm(a: int, b: int) -> int:
            return a*b / gcd(a, b)
        
        count, n = 0, len(nums)
        for i in range(n):
            l = nums[i]  
            for j in range(i, len(nums)):
                l = lcm(l, nums[j])
                if l == k: 
                    count += 1
                if l > k: 
                    break
        
        return count
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`