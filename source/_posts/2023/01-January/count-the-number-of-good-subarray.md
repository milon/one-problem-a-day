---
extends: _layouts.post
section: content
title: Count the number of good subarray
problemUrl: https://leetcode.com/problems/count-the-number-of-good-subarray/
date: 2023-01-18
categories: [sliding-window]
---

We will use a sliding window to count the number of good subarray.

```python
class Solution:
    def countGood(self, nums: List[int], k: int) -> int:
        res = cur = i = 0
        count = Counter()
        for j in range(len(nums)):
            k -= count[nums[j]]
            count[nums[j]] += 1
            while k <= 0:
                count[nums[i]] -= 1
                k += count[nums[i]]
                i += 1
            res += i
        return res
```

Time complexity: `O(n)`, n is the length of the array. <br/>
Space complexity: `O(n)`