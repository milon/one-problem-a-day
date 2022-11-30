---
extends: _layouts.post
section: content
title: Bitwise xor of all pairings
problemUrl: https://leetcode.com/problems/bitwise-xor-of-all-pairings/
date: 2022-11-30
categories: [bit-manipulation]
---

From Boolean algebra we know that n^0 = n and n^n = 0, from which we can infer that the xor of an even count of an integer n is 0, and the xor of an odd count of an integer n is n. We also know that the ^ operator is commutative and associative.

XOR of even times of a number is zero (0) <br/>
XOR of odd times of a number is number itself.

```python
class Solution:
    def xorAllNums(self, nums1: List[int], nums2: List[int]) -> int:
        x, y = 0, 0
        for num in nums1:
            x ^= num
        for num in nums2:
            y ^= num
        
        return (len(nums1) % 2 * y) ^ (len(nums2) % 2 * x)
```

Time complexity: `O(n)`, n is the length of the array <br/>
Space complexity: `O(1)`