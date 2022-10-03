---
extends: _layouts.post
section: content
title: Minimum time to make rope colorful
problemUrl: https://leetcode.com/problems/minimum-time-to-make-rope-colorful/
date: 2022-10-03
categories: [greedy]
---

For a group of continuous same characters, we need to delete all the group but leave only one character. For each group of continuous same characters, we need cost = sum_cost(group) - max_cost(group).

```python
class Solution:
    def minCost(self, colors: str, neededTime: List[int]) -> int:
        res = 0
        for i in range(1, len(colors)):
            if colors[i] == colors[i-1]:
                res += min(neededTime[i-1], neededTime[i])
                neededTime[i] = max(neededTime[i-1], neededTime[i])
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`