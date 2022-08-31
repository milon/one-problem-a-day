---
extends: _layouts.post
section: content
title: Continuous subarray sum
problemUrl: https://leetcode.com/problems/continuous-subarray-sum/
date: 2022-08-31
categories: [array-and-hashmap]
---

We will take a hashmap and keep the reminder along with their index in it. As a base case, we will take the subarray sum as 0 and keep the index -1 as we don't added anything yet in the subarray sum. Then we iterate over each element, add this to our currentSum and if it is divisible by k, then we check whether the length of the subarray is more than 1, that is why we store the index along with reminder. If we find one, we return true, else we add the reminder along with the index in the hashmap. If we iterate over the whole array and didn't find one yet, then we return false.

```python
class Solution:
    def checkSubarraySum(self, nums: List[int], k: int) -> bool:
        reminder = {0: -1}
        currentSum = 0
        for i, n in enumerate(nums):
            currentSum += n
            rem = currentSum % k
            if rem not in reminder:
                reminder[rem] = i
            elif i - reminder[rem] > 1:
                return True
        return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`