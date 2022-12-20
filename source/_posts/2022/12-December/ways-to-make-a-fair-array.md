---
extends: _layouts.post
section: content
title: Ways to make a fair array
problemUrl: https://leetcode.com/problems/ways-to-make-a-fair-array/
date: 2022-12-20
categories: [array-and-hashmap]
---

We will use odd prefix and even prefix to keep track of the sum of the odd and even indices. We will iterate through the array and keep track of the odd and even prefix. We will use a helper function to calculate the sum of the odd and even indices. We will keep track of the number of ways to make the array fair.

```python
class Solution:
    def waysToMakeFair(self, nums: List[int]) -> int:
        oddSum = sum(nums[1::2])
        evenSum = sum(nums[::2])
        oddPrefix, evenPrefix = 0, 0
        res = 0
        for i, num in enumerate(nums):
            if i % 2 == 0:
                even = evenPrefix + oddSum - oddPrefix
                evenPrefix += num
                odd = oddPrefix + evenSum - evenPrefix
            else:
                odd = oddPrefix + evenSum - evenPrefix
                oddPrefix += num
                even = evenPrefix + oddSum - oddPrefix
            res += (even == odd)

        return res
```

Time complexity: `O(n)` where `n` is the length of `nums`. <br/>
Space complexity: `O(1)`