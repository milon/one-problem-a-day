---
extends: _layouts.post
section: content
title: Numbers with same consecutive differences
problemUrl: https://leetcode.com/problems/numbers-with-same-consecutive-differences/
date: 2022-09-03
categories: [backtracking]
---

We will start from 1, and then take the last digit of the number, add k to it and append to the right of the current number, until we reach the required length of n. We append every number on the way to our result and finally return it.

```python
class Solution:
    def numsSameConsecDiff(self, n: int, k: int) -> List[int]:
        res = []
        
        def dfs(cur: str) -> None:
            if len(cur) == n:
                res.append(cur)
                return
            if int(cur[-1]) + k < 10:
                dfs(cur + str(int(cur[-1]) + k))
            if int(cur[-1]) - k >= 0 and k != 0:
                dfs(cur + str(int(cur[-1]) - k))
        
        for i in range(1, 10):
            dfs(str(i))
        
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`