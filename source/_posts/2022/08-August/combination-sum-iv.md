---
extends: _layouts.post
section: content
title: Combination sum IV
problemUrl: https://leetcode.com/problems/combination-sum-iv/
date: 2022-08-05
categories: [dynamic-programming]
---

This is very similar to coin change 2. But when you take one item from the allowed list, rather start it from the same index like coin change, you should start it from the beginning of the list.

```python
class Solution:
    def combinationSum4(self, nums: List[int], target: int) -> int:
        def _combinationSum4(pos, target, memo):
            if (pos, target) in memo:
                return memo[(pos, target)]
            
            if pos == len(nums) or target <= 0:
                return 1 if target == 0 else 0
            
            take = _combinationSum4(0, target-nums[pos], memo)
            skip = _combinationSum4(pos+1, target, memo)
            memo[(pos, target)] = take + skip
            
            return memo[(pos, target)]
            
        return _combinationSum4(0, target, {})
```

Time Complexity: `O(n*t)`, n is the numbers of the list, t is the target <br/>
Space Complexity: `O(n*t)`