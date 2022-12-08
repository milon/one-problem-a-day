---
extends: _layouts.post
section: content
title: Maximum number of non overlapping subarrays with sum equals target
problemUrl: https://leetcode.com/problems/maximum-number-of-non-overlapping-subarrays-with-sum-equals-target/
date: 2022-12-08
categories: [greedy]
---

We can be greedy and use a hash set to store the prefix sum. If the prefix sum minus `target` is in the hash set, then we will update the result and clear the hash set. We will return the result.

```python
class Solution:
    def maxNonOverlapping(self, nums: List[int], target: int) -> int:
        seen = set([0])
        res, cur = 0, 0
        for i, num in enumerate(nums):
            cur += num
            prev = cur - target
            if prev in seen:
                res += 1
                seen = set()
            seen.add(cur)
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
