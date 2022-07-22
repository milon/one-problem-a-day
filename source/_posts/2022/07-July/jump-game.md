---
extends: _layouts.post
section: content
title: Jump game
problemUrl: https://leetcode.com/problems/jump-game/
date: 2022-07-22
categories: [greedy]
---

This problem could definitely be solved by dynamic programming, but if we take greedy approach, we can solve it in linear time. We can iterate through the array from last index to first index. We set our initial goal to the last index value. If the sum of last index and the value of the last index is greater than or equal to our goal, then we move our goal to the current iteration index. After the whole iteration is done, if the goal is zero, than it's possible to move the last index and we return true, otherwise we return false.

```python
class Solution:
    def canJump(self, nums: List[int]) -> bool:
        goal = len(nums)-1
        for i in range(len(nums)-1, -1, -1):
            if i + nums[i] >= goal:
                goal = i
        return True if goal == 0 else False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`