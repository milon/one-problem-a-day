---
extends: _layouts.post
section: content
title: Single number
problemUrl: https://leetcode.com/problems/single-number/
date: 2022-07-13
categories: [bit-manipulation]
---

We can iterate through the entire array and XOR everything. For starter we start our result to 0, as it has no effect on our XOR operation. If we XOR the same numbers, it turns into 0. So, every pair will turn into 0, except the single number.

```python
class Solution:
    def singleNumber(self, nums: List[int]) -> int:
        res = 0
        for num in nums:
            res ^= num
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`
