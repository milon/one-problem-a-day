---
extends: _layouts.post
section: content
title: Broken calculator
problemUrl: https://leetcode.com/problems/broken-calculator/
date: 2022-11-23
categories: [greedy]
---

We can simulate the result. If target is greater than X, we can only multiply X by 2, otherwise we can only subtract 1 from X. So we can use greedy to find the optimal solution.

```python
class Solution:
    def brokenCalc(self, startValue: int, target: int) -> int:
        if startValue > target:
            return startValue - target
        
        if startValue == target:
            return 0
        
        if target % 2 == 0:
            return self.brokenCalc(startValue, target//2) + 1
        else:
            return self.brokenCalc(startValue, target+1) + 1
```

Time complexity: `O(log(n))`, n is the value of target <br/>
Space complexity: `O(log(n))`
