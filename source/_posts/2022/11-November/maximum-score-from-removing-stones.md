---
extends: _layouts.post
section: content
title: Maximum score from removing stones
problemUrl: https://leetcode.com/problems/maximum-score-from-removing-stones/
date: 2022-11-04
categories: [greedy]
---

We will sort 3 numbers and remove 1 stone from the largest 2 numbers until they all become 0. The number of stones removed is the maximum score.

```python
class Solution:
    def maximumScore(self, a: int, b: int, c: int) -> int:
        res = 0
        a, b, c = sorted([a, b, c], reverse=True)
        while a > 0 and b > 0:
            a -= 1
            b -= 1
            res += 1
            a, b, c = sorted([a, b, c], reverse=True)
        return res
```

Time complexity: `O(n)`, sorting 3 numbers can be done in `O(1)` time. <br/>
Space complexity: `O(1)`