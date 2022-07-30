---
extends: _layouts.post
section: content
title: Largest rectangle in histogram
problemUrl: https://leetcode.com/problems/largest-rectangle-in-histogram/
date: 2022-07-30
categories: [stack]
---

First we go through all the heights in a loop. We also keep a stack to calculate max area. If stack is empty, then we push the height along with the index it sits on. Then we check whether the height is less than the top of the stack. If yes, we pop it from the stack, calculate the max area, and keep track of max area with a running max area variable. after we go through all the items in heights list, we will go through one more time with the stack, and calculate the max area and then return the result.

```python
class Solution:
    def largestRectangleArea(self, heights: List[int]) -> int:
        maxArea = 0
        stack = []      # pair(index, height)

        for i, h in enumerate(heights):
            start = i
            while stack and stack[-1][1] > h:
                index, height = stack.pop()
                maxArea = max(maxArea, height * (i-index))
                start = index
            stack.append((start, h))

        for i, h in stack:
            maxArea = max(maxArea, h * (len(heights)-i))

        return maxArea
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`