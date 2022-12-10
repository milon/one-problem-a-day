---
extends: _layouts.post
section: content
title: Partition array such that maximum difference is k
problemUrl: https://leetcode.com/problems/partition-array-such-that-maximum-difference-is-k/
date: 2022-12-10
categories: [greedy]
---

We will sort the array and then we will iterate through the array and we will check if the difference between the current element and the previous element is greater than k, if it is, then we increate the result count by 1.

```python
class Solution:
    def partitionArray(self, nums: List[int], k: int) -> int:
        nums.sort()
        curMin, res = nums[0], 0
        for num in nums:
            if num-curMin > k:
                res += 1
                curMin = num
        return res+1
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`