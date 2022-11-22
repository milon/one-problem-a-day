---
extends: _layouts.post
section: content
title: Split array largest sum
problemUrl: https://leetcode.com/problems/split-array-largest-sum/
date: 2022-11-22
categories: [binary-search]
---

We binary search largest sum in range [max(nums), sum(nums)], which is left = max(nums), right = sum(nums).

- mid = left + (right - left) // 2
- If canPartition(mid) then:
    - Update the answer so far then try to minimize the largest sum by right = mid - 1
- Else:
    - Increate the largest sum by left = mid + 1.
- We need to write function canPartition(largestSum) to check if we can divide nums array into m subarrays such that no subarray sum is greater than largestSum.
    - We greedily take as many as elements to form a subarray as long as the sum of each subarray <= largestSum.
    - And check if we can form k subarray, with k <= m.

```python
class Solution:
    def splitArray(self, nums: List[int], k: int) -> int:
        def canPartition(largestSum):
            groups = 1
            curSum = 0
            for num in nums:
                curSum += num
                if curSum > largestSum:
                    groups += 1
                    curSum = num
            return groups <= k
        
        left, right = max(nums), sum(nums)
        res = right
        while left <= right:
            mid = left+(right-left)//2
            if canPartition(mid):
                res = mid
                right = mid-1
            else:
                left = mid+1
        return res
```
