---
extends: _layouts.post
section: content
title: Maximum sum with exactly k elements
problemUrl: https://leetcode.com/problems/maximum-sum-with-exactly-k-elements/
date: 2023-05-04
categories: [array-and-hashmap]
---

We will pick up the maximum number and add it to the result. Then for each iteration of k, we add 1 to the maximum number and add it to the result. We will return the result.

```python
class Solution:
    def maximizeSum(self, nums: List[int], k: int) -> int:
        max_num = max(nums)
        res = 0
        for _ in range(k):
            res += max_num
            max_num += 1
        return res
```

Time complexity: `O(k)` <br/>
Space complexity: `O(1)`