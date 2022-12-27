---
extends: _layouts.post
section: content
title: First day where you have been in all the rooms
problemUrl: https://leetcode.com/problems/first-day-where-you-have-been-in-all-the-rooms/
date: 2022-12-27
categories: [dynamic-programming]
---

The idea is that we need to go back a lot of times. Define by dp[i] is number of days to reach cell i. We can only reach it from the cell i-1, so we need at least dp[i-1] steps. Then it will lead us to dp[A[i-1]] cell, because we visited i-1 for the first time. Then we need to reach i-1 from A[i-1] again. And finally we need one more step.

```python
class Solution:
    def firstDayBeenInAllRooms(self, nextVisit: List[int]) -> int:
        n = len(nextVisit)
        dp = [0] * n
        for i in range(1, n):
            dp[i] = (2*dp[i-1] - dp[nextVisit[i-1]]+2) % (10**9+7)

        return dp[-1]
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`