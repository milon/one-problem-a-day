---
extends: _layouts.post
section: content
title: Number of subarrays having even product
problemUrl: https://leetcode.com/problems/number-of-subarrays-having-even-product/
date: 2022-12-07
categories: [array-and-hashmap]
---

For a subarray to have an even product, some elements must be even. However, we don't know which one (or which ones). It is simpler to work with conditions of a form "all elements must satisfy some condition" instead. For example, for a subarray to have an odd product, all elements must be odd.

Count even product subarrays by counting its complement -- odd product subarrays -- and subtracting it from the total number of subarrays, which is `n(n+1)/2`.

To count subarrays with odd elements only, group them by their right endpoint. If there have been k consequent odd numbers to this point, then there are k odd product subarrays ending at the current position.

```python
class Solution:
    def evenProduct(self, nums: List[int]) -> int:
        n = len(nums)
        _sum = (n * (n+1)) // 2

        odd, cur = 0, 0
        for num in nums:
            if num % 2 == 1:
                cur += 1
                odd += cur
            else:
                cur = 0
        return _sum - odd
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`