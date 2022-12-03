---
extends: _layouts.post
section: content
title: Number of subarrays with gcd equal to k
problemUrl: https://leetcode.com/problems/number-of-subarrays-with-gcd-equal-to-k/
date: 2022-12-03
categories: [math-and-geometry]
---

We will take every possible subarray of the input array and calculate the gcd of the subarray. If the gcd is equal to k, we will increment the count of such subarrays.

```python
class Solution:
    def subarrayGCD(self, nums: List[int], k: int) -> int:
        def gcd(a: int, b: int) -> int:
            while a and b:
                a, b = b, a%b
            return a or b
        
        count = 0
        n = len(nums)
        for i in range(n):
            tmp_gcd = 0
            for j in range(i,n):
                tmp_gcd = gcd(tmp_gcd, nums[j])

                if tmp_gcd == k:
                    count += 1
                elif tmp_gcd < k:
                    break
        
        return count
```

Time complexity: `O(n^2)` <br/>
Space complexity: `O(1)`