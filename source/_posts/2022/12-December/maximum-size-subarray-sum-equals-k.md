---
extends: _layouts.post
section: content
title: Maximum size subarray sum equals k
problemUrl: https://leetcode.com/problems/maximum-size-subarray-sum-equals-k/
date: 2022-12-07
categories: [array-and-hashmap]
---

We will use prefix sum to solve this problem. We will store the prefix sum in a hash map. If the prefix sum is equal to `k`, then we will update the maximum length. If the prefix sum minus `k` is in the hash map, then we will update the maximum length. We will return the maximum length.

```python
class Solution:
    def maxSubArrayLen(self, nums: List[int], k: int) -> int:
        prefixSum, res = 0, 0
        seen = {0: -1}
        for i, num in enumerate(nums):
            prefixSum += num
            if prefixSum == k:
                res = max(res, i+1)
            if prefixSum-k in seen:
                res = max(res, i-seen[prefixSum-k])
            if prefixSum not in seen:
                seen[prefixSum] = i
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`