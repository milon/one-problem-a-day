---
extends: _layouts.post
section: content
title: Max consecutive ones
problemUrl: https://leetcode.com/problems/max-consecutive-ones/
date: 2022-10-28
categories: [sliding-window]
---

We will count the number of consecutive ones and update the result if it is greater than the current result.

```python
class Solution:
    def findMaxConsecutiveOnes(self, nums: List[int]) -> int:
        count, res = 0, 0
        
        for num in nums:
            if num == 1:
                count += 1
                res = max(res, count)
            else:
                count = 0
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`