---
extends: _layouts.post
section: content
title: Minimum number of operations to convert time
problemUrl: https://leetcode.com/problems/minimum-number-of-operations-to-convert-time/
date: 2022-10-22
categories: [greedy]
---

We will convert the time to minutes. Then we will calculate the difference between the target time and the current time. If the difference is negative, we will add 24 hours to it. Then we will calculate the number of hours and minutes we need to change. The number of hours is the difference divided by 60. The number of minutes is the difference modulo 60. Then we will return the number of hours plus the number of minutes.

```python
class Solution:
    def convertTime(self, current: str, correct: str) -> int:
        current = 60*int(current[0:2]) + int(current[3:])
        correct = 60*int(correct[0:2]) + int(correct[3:])
        diff = correct - current
        return diff//60 + (diff%60)//15 + ((diff%60)%15)//5 + ((diff%60)%15)%5
```

Time Complexity: `O(1)` <br/>
Space Complexity: `O(1)`