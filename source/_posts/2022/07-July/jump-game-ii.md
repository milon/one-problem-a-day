---
extends: _layouts.post
section: content
title: Jump game II
problemUrl: https://leetcode.com/problems/jump-game-ii/
date: 2022-07-22
categories: [greedy]
---

This is very similar to jump game, we will go for a greedy approah. We will have 2 pointer, left and right to determine the level of each move. In every iteration we will calculate the maximum number of moves on level have and then move our left and right pointer to that position. We will repeat it until the last pointer reaches the end of the list.

```python
class Solution:
    def jump(self, nums: List[int]) -> int:
        left, right = 0, 0
        res = 0
        while right < len(nums)-1:
            max_jump = 0
            for i in range(left, right+1):
                max_jump = max(max_jump, i+nums[i])
            left = right+1
            right = max_jump
            res += 1
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`