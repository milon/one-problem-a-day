---
extends: _layouts.post
section: content
title: Maximum split of positive even integers
problemUrl: https://leetcode.com/problems/maximum-split-of-positive-even-integers/
date: 2022-11-30
categories: [greedy]
---

We can be greedy and try to split the number into as many parts as possible. We will start from the 2 and try to split it until we reach the end of the number. If we can't split the number, we will try to split the number starting from the 4 and so on.

```python
class Solution:
    def maximumEvenSplit(self, finalSum: int) -> List[int]:
        if finalSum % 2 == 1:
            return []
        res, num = [], 2
        while finalSum - num > num:
            res.append(num)
            finalSum -= num
            num += 2
        res.append(finalSum)
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`