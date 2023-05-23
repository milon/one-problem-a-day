---
extends: _layouts.post
section: content
title: Sum in a matrix
problemUrl: https://leetcode.com/problems/sum-in-a-matrix/
date: 2023-05-23
categories: [math-and-geometry]
---

We will iterate over each row and sort them. Then we iterate over each column and get the maximum value of the column. Finally, we return the sum of the maximum values.

```python
class Solution:
    def matrixSum(self, nums: List[List[int]]) -> int:
        ROWS, COLS = len(nums), len(nums[0])
        res = 0

        for num in nums:
            num.sort()

        for c in range(COLS):
            _max = -math.inf
            for r in range(ROWS):
                _max = max(_max, nums[r][c])
            res += _max
        
        return res
```

Time complexity: `O(nmlog(m))` where n is the number of rows and m is the number of columns. <br/>
Space complexity: `O(1)`

We can achieve the same result with just 1 line of code in python.

```python
class Solution:
    def matrixSum(self, nums: List[List[int]]) -> int:
        return sum(map(max, zip(*map(sorted, nums))))
```