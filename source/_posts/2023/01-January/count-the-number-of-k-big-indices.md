---
extends: _layouts.post
section: content
title: Count the number of k big indices
problemUrl: https://leetcode.com/problems/count-the-number-of-k-big-indices/
date: 2023-01-01
categories: [binary-search]
---

We will use binary search twice, one from left, one from right to find out how many elements are less than the current element.

```python
class Solution:
    def kBigIndices(self, nums: List[int], k: int) -> int:
        n = len(nums)
        left, right = [0]*n, [0]*n
        
        q = []
        for i, t in enumerate(nums):
            idx = bisect.bisect_left(q, t)
            left[i] = idx
            bisect.insort_left(q, t)
        
        q = []
        for i in range(n-1, -1, -1):
            t = nums[i]
            idx = bisect.bisect_left(q, t)
            right[i] = idx
            bisect.insort_left(q, t)
        
        res = 0
        for i in range(n):
            if left[i] >= k and right[i] >= k:
                res += 1
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`