---
extends: _layouts.post
section: content
title: 3Sum
problemUrl: https://leetcode.com/problems/3sum/
date: 2022-07-23
categories: [two-pointers]
---

If you already solved the 2 sum ii problem, you might get the idea. First we will sort the list. Then we take the first element at first position, then for the rest of the elements we take 2 pointers, and then solve it like 2 sum. When we found a solution, we append it to the result array. After we iterate over every element of the list, we return our result.

```python
class Solution:
    def threeSum(self, nums: List[int]) -> List[List[int]]:
        res = []
        nums.sort()
        
        for i, a in enumerate(nums):
            if i > 0 and a == nums[i-1]:
                continue
            l, r = i+1, len(nums)-1
            while l < r:
                threeSum = a + nums[l] + nums[r]
                if threeSum > 0:
                    r -= 1
                elif threeSum < 0:
                    l += 1
                else:
                    res.append([a, nums[l], nums[r]])
                    l += 1
                    while nums[l] == nums[l-1] and l < r:
                        l += 1
        return res
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`