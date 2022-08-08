---
extends: _layouts.post
section: content
title: Longest increasing subsequence
problemUrl: https://leetcode.com/problems/longest-increasing-subsequence/
date: 2022-08-08
categories: [dynamic-programming]
---

First we append the first element in our list to the result array. Then we iterate over the other elements and compare, if the value is larger than the last element of the result array, if yes, then append it to the result. If not, then we find the index of element which is less than or equal to our current element and replace it with the current element. We can use binary search to do that, as the result array is sorted. Then finally we return the length of the result array.

```python
class Solution:
    def lengthOfLIS(self, nums: List[int]) -> int:
        res = [nums[0]]
        for num in nums[1:]:
            if res[-1] < num:
                res.append(num)
            else:
                index = bisect_left(res, num)   # find the index of the number <= num
                res[index] = num
        return len(res)
```

Time Complexity: `O(nlog(n))`
Space Complexity: `O(n)`
