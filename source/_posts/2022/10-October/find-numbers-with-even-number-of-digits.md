---
extends: _layouts.post
section: content
title: Find numbers with even number of digits
problemUrl: https://leetcode.com/problems/find-numbers-with-even-number-of-digits/
date: 2022-10-16
categories: [array-and-hashmap]
---

Given an array `nums` of integers, return how many of them contain an even number of digits. We will use a helper function to count the number of digits of each number. Then iterate over each number, count their digit, and check if it is even.

```python 
class Solution:
    def findNumbers(self, nums: List[int]) -> int:
        def numDigit(num):
            digit = 0
            while num:
                digit += 1
                num //= 10
            return digit
        
        res = 0
        for num in nums:
            if numDigit(num) % 2 == 0:
                res += 1
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`