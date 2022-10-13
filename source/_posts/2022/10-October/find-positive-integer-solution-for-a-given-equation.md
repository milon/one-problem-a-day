---
extends: _layouts.post
section: content
title: Find positive integer solution for a given equation
problemUrl: https://leetcode.com/problems/find-positive-integer-solution-for-a-given-equation/
date: 2022-10-13
categories: [math-and-geometry]
---

Given a function `f(x, y)` and a value `z`, return all positive integer pairs `x` and `y` where `f(x,y) == z`. Rephrase the problem like given a matrix, each row and each column is increasing. Find all coordinates (i,j) that A[i][j] == z.

```python
"""
   This is the custom function interface.
   You should not implement it, or speculate about its implementation
   class CustomFunction:
       # Returns f(x, y) for any given positive integers x and y.
       # Note that f(x, y) is increasing with respect to both x and y.
       # i.e. f(x, y) < f(x + 1, y), f(x, y) < f(x, y + 1)
       def f(self, x, y):
"""

class Solution:
    def findSolution(self, customfunction: 'CustomFunction', z: int) -> List[List[int]]:
        res = []
        y = 1000
        for x in range(1, 1001):
            while y > 1 and customfunction.f(x, y) > z:
                y -= 1
            if customfunction.f(x, y) == z:
                res.append([x, y])
        return res
```

Time Complexity: `O(x+y)` <br/>
Space Complexity: `O(x)`