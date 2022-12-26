---
extends: _layouts.post
section: content
title: Bitwise or of all subsequence sums
problemUrl: https://leetcode.com/problems/bitwise-or-of-all-subsequence-sums/
date: 2022-12-26
categories: [bit-manipulation]
---

We will iterate over the array and update the prefix sum and bitwise or of all subsequence sums.

```python
class Solution:
    def subsequenceSumOr(self, nums: List[int]) -> int:
        res = prefix = 0
        for num in nums:
            prefix += num
            res = num | prefix | res
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`