---
extends: _layouts.post
section: content
title: Maximum xor after operations
problemUrl: https://leetcode.com/problems/maximum-xor-after-operations/
date: 2022-11-15
categories: [bit-manipulation]
---

The problem calls for choosing an integer x, selecting an element n of the list, applying the compound operator op(n,x) = (x&n)^n, and taking the bit-intersection of the modified set. Because of the associative and commutative properties of the XOR operator, it does not matter which n we choose in nums.

```python
class Solution:
    def maximumXOR(self, nums: List[int]) -> int:
        res = 0
        for n in nums:
            res |= n      
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

We can do it with one line using reduce.

```python
class Solution:
    def maximumXOR(self, nums: List[int]) -> int:
        return reduce(ior, nums)
```