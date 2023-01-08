---
extends: _layouts.post
section: content
title: Find xor beauty of array
problemUrl: https://leetcode.com/problems/find-xor-beauty-of-array/
date: 2023-01-08
categories: [bit-manipulation]
---

First, note that by symmetry of i and j, we know that the value of ((nums[i] | nums[j]) & nums[k]) and ((nums[j] | nums[i]) & nums[k]) are equal. Which then implies that for a pair of (i, j) where i != j, the bitwise XOR of ((nums[i] | nums[j]) & nums[k]) and ((nums[j] | nums[i]) & nums[k]) is 0. Thus, we only need to deal with the triplets (i, j, k) where i == j.

Now we only need to consider the triplets (i, j, k) where i == j, so that ((nums[i] | nums[j]) & nums[k]) = ((nums[i] | nums[i]) & nums[k]) = nums[i] & nums[k]. By symmetry of i and k, we know that the value of nums[i] & nums[k] and nums[k] & nums[i] are equal. Which then implies that for a pair of (i, k) where i != k, the bitwise XOR of nums[i] & nums[k] and nums[k] & nums[i] is 0. Thus, we only need to deal with the case of i == k.

Therefore, we only need to consider the triplets (i, j, k) where i == j == k, and the final answer reduces to the bitwise XOR of ((nums[i] | nums[j]) & nums[k]) = ((nums[i] | nums[i]) & nums[i]) = nums[i].

```python
class Solution:
    def getXORBeauty(self, nums: List[int]) -> int:
        res = 0
        for n in nums:
            res ^= n
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`

