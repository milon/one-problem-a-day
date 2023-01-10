---
extends: _layouts.post
section: content
title: Find good days to rob the bank
problemUrl: https://leetcode.com/problems/find-good-days-to-rob-the-bank/
date: 2023-01-10
categories: [array-and-hashmap]
---

We will calculate the prefix sum and postfix sum of the securities. Then we iterate form time till securities-time, check the prefix and postfix sum for the given condition, if the satify, we add them to the result.

```python
class Solution:
    def goodDaysToRobBank(self, security: List[int], time: int) -> List[int]:
        n = len(security)
        pre = [0]*(n+1)
        post = [0]*(n+1)

        for i in range(1, n):
            if security[i] <= security[i-1]:
                pre[i] = pre[i-1]+1

        for i in range(n-2, -1, -1):
            if security[i] <= security[i+1]:
                post[i] = post[i+1]+1

        res = []
        for i in range(time, n-time):
            if pre[i] >= time and post[i] >= time:
                res.append(i)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`