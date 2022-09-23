---
extends: _layouts.post
section: content
title: Partition to k equal sum subsets
problemUrl: https://leetcode.com/problems/partition-to-k-equal-sum-subsets/
date: 2022-09-23
categories: [backtracking]
---

We can try to split the numbers to k subsets, for that every subsets' sum will be total sum divided by k. It is best to iterate the input from biggest numbers, so that we can cut off bad solution close to the root of the decision tree. So, we sort the array in descending order. Then we start from the beginning index and look for every possible subsets, and when we reach at the end, if we are at the end of the list, we return true, else false.

```python
class Solution:
    def canPartitionKSubsets(self, nums: List[int], k: int) -> bool:
        nums.sort(reverse=True)
        total = sum(nums)
        
        if total % k > 0:
            return False
        
        target = total / k
        sums = [0] * k
        lastIndex = len(nums)-1
        
        def backtrack(i):
            num = nums[i]
            for bucket_i in range(k):
                sums[bucket_i] += num
                
                if sums[bucket_i] <= target:
                    if i == lastIndex:
                        return True
                    
                    if backtrack(i+1):
                        return True
                
                sums[bucket_i] -= num
                
                if bucket_i < k-1 and sums[bucket_i+1:].count(sums[bucket_i]) == k-1-bucket_i:
                        return False
            return False
        
        return backtrack(0)
```

Time Complexity: `O(k * 2^n)` <br/>
Space Complexity: `O(k)`