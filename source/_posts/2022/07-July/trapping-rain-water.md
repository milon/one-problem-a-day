---
extends: _layouts.post
section: content
title: Trapping rain water
problemUrl: https://leetcode.com/problems/trapping-rain-water/
date: 2022-07-25
categories: [two-pointers]
---

We will iterate over the whole list, and also check the left and right side for the highest value, then substruct the value itself from the highest value, ans add it to a running sum. Then we return the result after the iteration is over.

```python
class Solution:
    def trap(self, height: List[int]) -> int:
        if len(height) == 0:
            return 0
        l, r = 0, len(height)-1
        leftMax, rightMax = height[l], height[r]
        res = 0
        while l < r:
            if leftMax < rightMax:
                l += 1
                leftMax = max(leftMax, height[l])
                res += leftMax - height[l]
            else:
                r -= 1
                rightMax = max(rightMax, height[r])
                res += rightMax - height[r]
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`