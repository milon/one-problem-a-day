---
extends: _layouts.post
section: content
title: Longest subsequence with limited sum
problemUrl: https://leetcode.com/problems/longest-subsequence-with-limited-sum/
date: 2022-12-25
categories: [array-and-hashmap]
---

We will sort the numbers and then create a prefix sum array. Then we will iterate over the numbers and find the index of the largest number that is less than or equal to `limit - nums[i]`. We will update the result.

```python
class Solution:
    def answerQueries(self, nums: List[int], queries: List[int]) -> List[int]:
        nums.sort()
        prefix = [0]
        for num in nums:
            prefix.append(prefix[-1]+num)
        
        res = []
        for query in queries:
            idx = bisect.bisect_right(nums, query)
            res.append(idx-1)
        
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`

We can do the same thing using python's built in methods.

```python
class Solution:
    def answerQueries(self, nums: List[int], queries: List[int]) -> List[int]:
        nums = list(accumulate(sorted(nums)))
        return [bisect_right(nums, q) for q in queries]
```
