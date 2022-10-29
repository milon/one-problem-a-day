---
extends: _layouts.post
section: content
title: Earliest possible day of full bloom
problemUrl: https://leetcode.com/problems/earliest-possible-day-of-full-bloom/
date: 2022-10-29
categories: [greedy]
---

We can be greedy about the solution. We need to plant the flower that takes longest possible time to grow the earliest. So, we will sort the flowers in descending order of their grow time. Then we will plant them one by one and check if we can bloom all the flowers in the given days. If we can, then we will try to plant the next flower earlier. If we can't, then we will plant the next flower later. We will do this until we find the earliest possible day of full bloom.

```python
class Solution:
    def earliestFullBloom(self, plantTime: List[int], growTime: List[int]) -> int:
        res = 0
        for grow, plant in sorted(zip(growTime, plantTime)):
            res = max(res, grow) + plant
        return res
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(1)`
