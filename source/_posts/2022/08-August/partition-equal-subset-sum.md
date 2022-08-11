---
extends: _layouts.post
section: content
title: Partition equal subset sum
problemUrl: https://leetcode.com/problems/partition-equal-subset-sum/
date: 2022-08-10
categories: [dynamic-programming]
---

This is basically a 0-1 knapsack problem, for each element, either we can take the element or leave it. First, we will check, if the sum of the numbers is not even, we immediately return false. Then we calculate the target by dividing the sum by 2. Then we check if we can have the target from the input array from any of it's subarray, If yes, then we return true, else return false.

```python
class Solution:
    def canPartition(self, nums: List[int]) -> bool:
        if sum(nums) % 2 != 0:
            return False
        target = sum(nums) // 2
        dp = set()
        dp.add(0)
        for i in range(len(nums)-1, -1, -1):
            nextDp = set()
            for t in dp:
                if t + nums[i] == target:
                    return True
                nextDp.add(t + nums[i])
                nextDp.add(t)
            dp = nextDp
        return False
```

Time Complexity: `O(sum(n))`, n is the input array. <br/>
Space Complexity: `O(sum(n))`