---
extends: _layouts.post
section: content
title: 3sum closest
problemUrl: https://leetcode.com/problems/3sum-closest/
date: 2022-08-27
categories: [array-and-hashmap]
---

We have already sorted the 3 sum problem, it is basically the same problem with a little twist. First we sort the array, then we take the first element at first position, then for the rest of the elements we take 2 pointers, and then solve it like 2 sum, but we will also keep track of the the minimum sum at that point. If we already find an exect match, we will return the target, else when the iteration is over, we will return the target and minimum sum adding together.

```python
class Solution:
    def threeSumClosest(self, nums: List[int], target: int) -> int:
        nums.sort()
        minimum = math.inf
        
        for i in range(len(nums)-2):
            l = i+1
            r = len(nums)-1
            while l < r:
                res = nums[i] + nums[l] + nums[r] - target
                if abs(res) <= abs(minimum):
                    minimum = res
                
                if res == 0:
                    return target
                elif res < 0:
                    l += 1
                else:
                    r -= 1
                    
        return minimum + target
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(1)`