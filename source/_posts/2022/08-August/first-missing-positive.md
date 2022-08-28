---
extends: _layouts.post
section: content
title: First missing positive
problemUrl: https://leetcode.com/problems/first-missing-positive/
date: 2022-08-28
categories: [array-and-hashmap]
---

We will use our input array as the hashset, so that we can solve the problem in constant space. First, we will iterate over the input, and mark each negative number to 0, as it doesn't have any significance in our result. Then we iterate over the input again, and mark the position of value-1 of input array as negative, which will give us the answer, when we iterate over it again, for example, if 3 is present in the input array, we mark the value at position (3-1)= 2 as negative, that means if index at position 2 is negative, that means we have 3 in our input array.

Finally, we iterate over the input array 1 more time, check which index is missing, and return that index+1 as our result. If we can successfully iterate over the input array, that means all number is present starting from 1 to length of the input in the array, so then we return the next number of the length of the array.

```python
class Solution:
    def firstMissingPositive(self, nums: List[int]) -> int:
        for i, n in enumerate(nums):
            if n < 0:
                nums[i] = 0
        for i, n in enumerate(nums):
            val = abs(n)
            if 1 <= val <= len(nums):
                if nums[val-1] > 0:
                    nums[val-1] *= -1
                elif nums[val-1] == 0:
                    nums[val-1] = -1 * (len(nums)+1)
        
        for i in range(1, len(nums)+1):
            if nums[i-1] >= 0:
                return i
        return len(nums)+1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`