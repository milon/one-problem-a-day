---
extends: _layouts.post
section: content
title: Maximum xor of two numbers in an array
problemUrl: https://leetcode.com/problems/maximum-xor-of-two-numbers-in-an-array/
date: 2022-08-30
categories: [bit-manipulation]
---

we will create a mask of first character 1 for all 32 position in a 32 bit integer. Then we created hashset to calculate which number has the largest most significant bit. Then we create a temporary variable to store the output, and check in the hashset that which value is already present if we do a XOR operation. Then we return that result.

```python
class Solution:
    def findMaximumXOR(self, nums: List[int]) -> int:
        mask, output = 0, 0
        for i in range(32, -1, -1):
            mask = mask | 1 << i
            found = set([mask & n for n in nums])
            
            temp = output | 1 << i
            for f in found:
                if f^temp in found:
                    output = temp
        return output
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`