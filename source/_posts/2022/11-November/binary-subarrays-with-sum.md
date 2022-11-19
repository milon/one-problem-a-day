---
extends: _layouts.post
section: content
title: Binary subarrays with sum
problemUrl: https://leetcode.com/problems/binary-subarrays-with-sum/
date: 2022-11-19
categories: [array-and-hashmap, sliding-window]
---

We can count the occurance of all the prefix sums. Then we will iterate through the prefix sums and check if the prefix sum minus the goal is in the hashmap. If yes, we will add the number of occurance of the prefix sum minus the goal to the result. We will continue this process until we reach the end of the prefix sums.

```python
class Solution:
    def numSubarraysWithSum(self, nums: List[int], goal: int) -> int:
        prefix = [0]
        for num in nums:
            prefix.append(prefix[-1] + num)
        
        res = 0
        count = collections.Counter()
        for p in prefix:
            res += count[p]
            count[p+goal] += 1
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can also use a sliding window to solve this problem. We will use two pointers to represent the start and end of the sliding window. We will keep track of the number of zeros in the sliding window. We will increment the end pointer until the number of zeros in the sliding window is less than or equal to the goal. If the number of zeros in the sliding window is equal to the goal, we will increment the start pointer until the number of zeros in the sliding window is less than the goal. We will continue this process until we reach the end of the array.

```python
class Solution:
    def numSubarraysWithSum(self, nums: List[int], goal: int) -> int:
        def atMost(goal):
            if goal < 0:
                return 0
            res, l = 0, 0
            for r in range(len(nums)):
                goal -= nums[r]
                while goal < 0:
                    goal += nums[l]
                    l += 1
                res += r-l+1
            return res
        
        return atMost(goal) - atMost(goal-1)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`