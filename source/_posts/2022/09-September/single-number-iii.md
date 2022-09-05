---
extends: _layouts.post
section: content
title: Single number III
problemUrl: https://leetcode.com/problems/single-number-iii/
date: 2022-09-05
categories: [bit-manipulation]
---

We will be using the XOR trick i.e `n^n=0`. During first traversal we will get the XOR of the required two numbers, then we will get the least significant bit of the XOR operation. This means the two numbers should have opposite bits at the same place of the lsb of the XOR operation. Using this we can segregate the two numbers in two groups and then doing XOR again we will get the two required numbers.

```python
class Solution:
    def singleNumber(self, nums: List[int]) -> List[int]:
        res = [0, 0]
        xor = 0
        
        for num in nums:
            xor ^= num
        
        lsb = xor & (-xor)
        
        for num in nums:
            if num & lsb == 0:
                res[0] ^= num
            else:
                res[1] ^= num
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`