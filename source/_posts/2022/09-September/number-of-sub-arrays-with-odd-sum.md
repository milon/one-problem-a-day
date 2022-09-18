---
extends: _layouts.post
section: content
title: Number of sub arrays with odd sum
problemUrl: https://leetcode.com/problems/number-of-sub-arrays-with-odd-sum/
date: 2022-09-18
categories: [math-and-geometry]
---

We will start counting both the odd and even numbers in the array. If the current number is even, then the number of odd subarray will the count of odd numbers. Otherwise, we will change the odd by adding 1 to the even numbers, and swap even with the old odd numbers. Then we add odd number to the result on each iteration. Finally, we will return the result by modding with the given mod value.

```python
class Solution:
    def numOfSubarrays(self, arr: List[int]) -> int:
        MOD = 10**9+7
        
        even, odd = 0, 0
        res = 0
        
        for x in arr:
            if x % 2 == 0:
                even += 1
            else:
                old_odd = odd
                odd = even + 1
                even = old_odd
            
            res += odd
            
        return res % MOD
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`