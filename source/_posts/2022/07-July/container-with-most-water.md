---
extends: _layouts.post
section: content
title: Container with most water
problemUrl: https://leetcode.com/problems/container-with-most-water/
date: 2022-07-15
categories: [two-pointers]
---

We will take two pointers, one at the beginning and another at the end. Then we calculate the water in between by taking the min value of this 2 position and multiply by the difference of these pointers. We will keep a running max result. Then we move the pointer from the lowest number and move it by 1. Then repeat the process again until 2 pointers meet.

```python
class Solution:
    def maxArea(self, height: List[int]) -> int:
        left, right = 0 , len(height)-1
        res = 0
        
        while left < right:
            res = max(res, min(height[left], height[right]) * (right - left))
            if height[left] < height[right]:
                left += 1
            else:
                right -= 1
        return res
```

We traverse the height list only once, so time complexity is `O(n)`. We only use one variable to keep track of our max result, so space complexity is `O(1)`.