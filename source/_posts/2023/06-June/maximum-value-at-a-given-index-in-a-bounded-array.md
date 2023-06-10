---
extends: _layouts.post
section: content
title: Maximum value at a given index in a bounded array
problemUrl: https://leetcode.com/problems/maximum-value-at-a-given-index-in-a-bounded-array/
date: 2023-06-09
categories: [binary-search]
---

We can use binary search to find the maximum value at a given index in a bounded array. We can use the formula for the sum of an arithmetic series to find the maximum value at a given index. The formula is `n * (n+1) // 2`. We can use this formula to find the maximum value at a given array.

```python
class Solution:
    def check(self, a):
        left_offset = max(a - self.index, 0)
        result = (a + left_offset) * (a - left_offset + 1) // 2
        right_offset = max(a - ((self.n - 1) - self.index), 0)
        result += (a + right_offset) * (a - right_offset + 1) // 2
        return result - a

    def maxValue(self, n, index, maxSum):
        self.n = n
        self.index = index

        maxSum -= n
        left, right = 0, maxSum
        while left < right:
            mid = (left + right + 1) // 2
            if self.check(mid) <= maxSum:
                left = mid
            else:
                right = mid - 1
        result = left + 1
        return result
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`