---
extends: _layouts.post
section: content
title: Subarray sum equals k
problemUrl: https://leetcode.com/problems/subarray-sum-equals-k/
date: 2022-08-31
categories: [array-and-hashmap]
---

This problem can't be solved using sliding window as it is not only positive, or only negative or sorted. So, we iterate over each item in the input, calculate prefix sum and store it in a hashmap. Then we check whether the complement of the previous sum (previous sum - k) is in the lookup hashmap. If we found it, we add it to our result, and finally return the result when iteration is over.

```python
class Solution:
    def subarraySum(self, nums: List[int], k: int) -> int:
        res, currentSum = 0, 0
        prefixSum = {0: 1}
        
        for n in nums:
            currentSum += n
            diff = currentSum - k
            
            res += prefixSum.get(diff, 0)
            prefixSum[currentSum] = 1 + prefixSum.get(currentSum, 0)
            
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`