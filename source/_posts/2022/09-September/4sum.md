---
extends: _layouts.post
section: content
title: 4sum
problemUrl: https://leetcode.com/problems/4sum/
date: 2022-09-01
categories: [array-and-hashmap]
---

We will sort the array and start from first element i, the take the next element j which is not equal to i, then take the next element as l, and the last element of the list as r, added them, compare them with the target, if we found a match, we add it to our result and move our l to next element which is not equal to current l. We repeat the whole process until i reaches last item - 3 position. Then we return our result.

```python
class Solution:
    def fourSum(self, nums: List[int], target: int) -> List[List[int]]:
        n = len(nums)
        nums.sort()
        
        res = []
        for i in range(n-3):
            if i > 0 and nums[i] == nums[i-1]:
                continue
            
            for j in range(i+1, n-2):
                if j > i+1 and nums[j] == nums[j-1]:
                    continue
                    
                l, r = j+1, n-1
                while l < r:
                    fourSum = nums[i] + nums[j] + nums[l] + nums[r]
                    if fourSum < target:
                        l += 1
                    elif fourSum > target:
                        r -= 1
                    else:
                        res.append([nums[i], nums[j], nums[l], nums[r]])
                        l += 1
                        while nums[l] == nums[l-1] and l < r:
                            l += 1
        return res
```

Time Complexity: `O(n^3)` <br/>
Space Complexity: `O(1)`