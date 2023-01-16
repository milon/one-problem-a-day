---
extends: _layouts.post
section: content
title: Minimum moves to reach target score
problemUrl: https://leetcode.com/problems/minimum-moves-to-reach-target-score/
date: 2023-01-16
categories: [greedy]
---

We should use double action as late as possible, as many times as possible. We can use a greedy approach to solve this problem.

```python
class Solution:
    def minMoves(self, target: int, maxDoubles: int) -> int:
        res = 0
        while target > 1 and maxDoubles > 0:
            res += 1 + target % 2
            maxDoubles -= 1
            target //= 2
        return target - 1 + res
```

Time complexity: `O(log(n))`, n is the target. <br/>
Space complexity: `O(1)`