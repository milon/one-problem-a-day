---
extends: _layouts.post
section: content
title: Minimum size subarray sum
problemUrl: https://leetcode.com/problems/minimum-size-subarray-sum/
date: 2022-08-29
categories: [sliding-window]
---

We will take a sliding window, add it to the sum, if the sum is greater than or equals to the target, we calculate the width of our sliding window and compare with our current result and took the minimum. Then we move our left pointer to 1 place and repeat until it reaches the end of the input array. Finally, we return our running minimum window length as result.

```python
class Solution:
    def minSubArrayLen(self, target: int, nums: List[int]) -> int:
        left, res = 0, math.inf
        _sum = 0
        
        for right in range(len(nums)):
            _sum += nums[right]
            while _sum >= target:
                _sum -= nums[left]
                res = min(res, right-left+1)
                left += 1
                
        return 0 if res == math.inf else res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`